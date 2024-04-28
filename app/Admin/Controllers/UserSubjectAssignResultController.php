<?php

namespace App\Admin\Controllers;

use App\Models\Quiz\Subject;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Quiz\UserSubjectAssignResult;
use Encore\Admin\Controllers\AdminController;

class UserSubjectAssignResultController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User Subject Assign Result';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserSubjectAssignResult);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('user.name', __('User'));
        $grid->column('subject.name', __('Subject/Topic'));
        $grid->column('result', __('Result'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(UserSubjectAssignResult::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('user.name', __('User'));
        $show->field('subject.name', __('Subject/Topic'));
        $show->field('result', __('Result'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserSubjectAssignResult);

        $form->display('id', __('ID'));
        $form->select('user_id', __('User'))->options(User::all()->pluck('name', 'id'));
        $form->select('subject_id', __('Subject/Topic'))->options(Subject::all()->pluck('name', 'id'));
        $form->number('result', __('Result'));
        $form->datetime('created_at', __('Created At'));
        $form->datetime('updated_at', __('Updated At'));

        return $form;
    }
}
