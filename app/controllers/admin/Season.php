<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\Validate;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\activerecord\Find;
use app\models\activerecord\FindById;
use app\models\activerecord\Insert;
use app\models\Season as SeasonModel;

class Season implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master = 'admin/index.php';
    public string $baseView = 'admin/season';
    private ?SeasonModel $seasonModel = null;

    public function __construct()
    {
        $this->seasonModel = new SeasonModel;
    }

    public function index(array $args)
    {
        $this->view = 'admin/season/index.php';
        $this->data = [
            'title' => 'Lista de temporadas',
            'baseView'  => $this->baseView,
        ];
    }

    /**
     * id, number, title, serie_id
     */
    public function edit(array $args)
    {
        $season = $this->seasonModel->execute(
            new FindById(
                field: 'id',
                value: $args[0],
                fields: 'id, number, title, serie_id',
                pdoFetchClass: get_class($this->seasonModel)
            )
        );

        $this->view = 'admin/season/edit.php';
        $this->baseView = "/admin/serie/edit/{$season->serie_id}";
        $this->data = [
            'title' => 'Editar temporada',
            'season'    => $season,
            'baseView'  => $this->baseView
        ];
    }

    public function show(array $args)
    {
        $season = $this->seasonModel->execute(
            new FindById(
                field: 'id',
                value: $args[0],
                fields: 'id, number, title, serie_id',
                pdoFetchClass: get_class($this->seasonModel)
            )
        );

        $this->view = 'admin/season/show.php';
        $this->baseView = "/admin/serie/edit/{$season->serie_id}";
        $this->data = [
            'title' => 'Visualizar Temporada',
            'baseView'  => $this->baseView,
            'season' => $season
        ];
    }

    public function update(array $args)
    {

    }

    public function add(array $args)
    {
        $this->view = 'admin/season/add.php';
        $this->data = [
            'title' => 'Adicionar temporada',
            'serie_id' => $args[0],
            'baseView'  => $this->baseView,
        ];
    }

    public function store()
    {
        $validate = new Validate;
        $validate->handle([
            'number' => [REQUIRED, ONLYNUMBER],
            'title' => [REQUIRED],
            'serie_id'  => [REQUIRED]
        ]);

        if($validate->errors){
            return redirect("/admin/season/add/{$validate->data['serie_id']}");
        }

        $season = new SeasonModel;
        $season->number = $validate->data['number'];
        $season->title = $validate->data['title'];
        $season->serie_id = $validate->data['serie_id'];

        $created = $season->execute(
            new Insert
        );

        if($created){
            Flash::set('created', "A temporada {$validate->data['title']} foi inserida!");
        }

        return redirect("/admin/serie/edit/{$validate->data['serie_id']}");
    }

    public function destroy(array $args)
    {
        $season = $this->seasonModel->execute(
            new FindById(
                field: 'id',
                value: $args[0],
                fields: 'id, title, serie_id',
                pdoFetchClass: get_class($this->seasonModel)
            )
        );
        
        $this->seasonModel->execute(
            new Delete(
                field: 'id',
                value: $args[0]
            )
        );

        Flash::set('success', "A temporada \"{$season->title}\" foi excluída com sucesso!");

        return redirect("/admin/serie/edit/{$season->serie_id}");
    }
}