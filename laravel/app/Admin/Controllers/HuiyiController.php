<?php

namespace App\Admin\Controllers;

use App\Huiyi;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class HuiyiController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Huiyi::class, function (Grid $grid) {
//            $grid->disableCreation();//禁止创建按钮
//            $grid->actions(function ($actions) {
//                $actions->disableDelete();
//                $actions->disableEdit();
//            });//关闭编辑和删除按钮
            $grid->actions(function ($actions) {
                // append一个操作
                $actions->append('<a href=""><i class="fa fa-eye"></i></a>');
                // prepend一个操作
                $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
            });
            $grid->model()->where('bus_number', '!=', 0);
            $grid->id('ID')->sortable();
            $grid->code();
            $grid->unit();
            $grid->username('Name');
            $grid->phone();
            $grid->bus_number('BUS');
            $states = [
                'on'  => ['value' => '男', 'text' => '男', 'color' => 'primary'],
                'off' => ['value' => '女', 'text' => '女', 'color' => 'default'],
            ];
            $grid->sex()->switch($states);
            $grid->column('bus.link_man');
            $grid->options()->select([
                1 => 'A',
                2 => 'B',
                3 => 'C',
                4 => 'D',
            ]);

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Huiyi::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->image('image_column');//图片上传
        });
    }
}
