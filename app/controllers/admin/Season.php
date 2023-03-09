<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\Validate;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Insert;
use app\models\Season as SeasonModel;

class Season implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master = 'admin/index.php';
    public string $baseView = 'admin/season';

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

    }

    public function show(array $args)
    {

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

    }
}