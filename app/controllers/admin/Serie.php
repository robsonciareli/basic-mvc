<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\Validate;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindBy;
use app\models\activerecord\Insert;
use app\models\activerecord\Update;
use app\models\Serie as SerieModel;

class Serie implements ControllerInterface
{
    public array $data = [];
    public string $view = '';
    public string $master = 'admin/index.php';

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
        ];
        
    }

    public function show(array $args)
    {
        $serie = (new SerieModel)->execute(
            new FindBy(
                field:'id',
                value: $args[0],
                fields:'name, resume'
            )
        );

        $this->view = 'admin/serie/serie.php';
        $this->data = [
            'title' => 'Série',
            'serie' => $serie,
        ];
    }

    public function edit(array $args)
    {
        $serie = (new SerieModel)->execute(
            new FindBy(
                field:'id',
                value: $args[0],
                fields: 'id, name, resume'
            )
        );

        $this->view = 'admin/serie/edit.php';
        $this->data = [
            'title' => 'Editar Série',
            'serie' => $serie
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

        if($validate->errors){
            return redirect('admin/serie/edit.php');
        }

        $serie = new SerieModel;
        $serie->name    = $validate->data['name'];
        $serie->resume  = $validate->data['resume'];

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
            'title' => 'Adicionar Série',
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