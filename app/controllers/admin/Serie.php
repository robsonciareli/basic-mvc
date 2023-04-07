<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\UploadImage;
use app\classes\Validate;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindById;
use app\models\activerecord\Insert;
use app\models\activerecord\Update;
use app\models\Serie as SerieModel;

use function PHPSTORM_META\type;

class Serie implements ControllerInterface
{
    public array $data = [];
    public string $view = '';
    public string $master = 'admin/index.php';
    public string $baseView = '/admin/serie';
    private ?SerieModel $serieModel = null;

    public function __construct()
    {
        $this->serieModel = new SerieModel();
    }

    public function index(array $args)
    {
        $series = (new SerieModel)->execute(
            new FindAll()
        );

        $this->view = $this->view ?: 'admin/serie/index.php';
        $this->data = [
            'title'     => 'Lista de série',
            'series'    => $series,
            'add'       => '/admin/serie/addSerie',
            'baseView'=> $this->baseView,
        ];
        
    }

    public function show(array $args)
    {
        $serie = (new SerieModel)->execute(
            new FindById(
                field:'id',
                value: $args[0],
                fields:'id, name, resume',
                pdoFetchClass: get_class($this->serieModel)
            )
        );
        $this->view = 'admin/serie/serie.php';
        $this->data = [
            'title'     => 'Visualizar série',
            'serie'     => $serie,
            'baseView'  => $this->baseView,
        ];
    }

    public function edit(array $args)
    {
        $serie = (new SerieModel)->execute(
            new FindById(
                field:'id',
                value: $args[0],
                fields: 'id, name, resume, cover_image',
                pdoFetchClass: get_class($this->serieModel)
            )
        );

        $this->view = 'admin/serie/edit.php';
        $this->data = [
            'title' => 'Editar série',
            'serie' => $serie,
            'baseView'=> $this->baseView,
        ];
    }

    
    public function update(array $args)
    {
        $validate = new Validate;
        $validate->handle([
            'id'        => [REQUIRED],
            'name'      => [REQUIRED],
            'resume'    => [REQUIRED]
            ]
        );

        if($_FILES['cover_image']){
            $upload = new UploadImage($_FILES['cover_image'], 'series');
        }
        
        if($validate->errors){
            return redirect('admin/serie/edit.php');
        }

        $serie = new SerieModel;
        $serie->name    = $validate->data['name'];
        $serie->resume  = $validate->data['resume'];
        $serie->cover_image  = $upload->getFileName();

        $serie->execute(
            new Update(
                field: 'id',
                value: $validate->data['id']
            )
        );

        return redirect('admin/serie');
    }


    public function addSerie()
    {
        $this->view = 'admin/serie/addSerie.php';
        $this->data = [
            'title' => 'Adicionar série',
            'baseView'=> $this->baseView,
        ];
    }

    public function store()
    {
        $validate = new Validate();
        $validate->handle([
            'name'  => [REQUIRED],
            'resume'    => [REQUIRED]
        ]);

        if($validate->errors){
            return redirect('admin/serie/addSerie');
        }

        $serie = new SerieModel;
        $serie->name    = $validate->data['name'];
        $serie->resume  = $validate->data['resume'];

        $created = $serie->execute(
            new Insert
        );

        if($created){
            Flash::set('created', "A Série {$validate->data['name']} foi inserida com sucesso!", 'success');
        }
        
        return redirect('/admin/serie');
    }

    public function destroy(array $args)
    {
        (new SerieModel)->execute(
            new Delete(
                field:'id',
                value: $args['0']
            )
        );

        Flash::set('created', "Série excluída com sucesso!", 'success');

        return redirect('/admin/serie');
    }

}