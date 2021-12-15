<?php

namespace app\controllers;

use app\models\SchoolClass;
use app\models\Teacher;

class ClassesController extends AppController
{
    public function indexAction()
    {

    }

    public function tableOutputAction()
    {
        # получение моделей данных
        $class = new SchoolClass();
        $teacher = new Teacher();

        $classes = $class->findAll();

        $classSchool = array();

        foreach ($classes as $class) {
            $objectTeacher = $teacher->findOne($class['id_teacher']);
            $objectClassSchool = [
                'classId' => $class['id'],
                'numberClass' => $class['number'],
                'teacher' => $objectTeacher,
            ];

            $classSchool[] = $objectClassSchool;
        }

        $this->set(compact('classSchool'));
    }

    public function createAction()
    {
        $teacher = new Teacher();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $teachers = $teacher->findAll();

            $this->set(compact('teachers'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numberClass = $_POST['numberClass'];
            $teacherId = $_POST['teacherId'];

            $classes = new SchoolClass();
            $classes->add([
                'number' => $numberClass,
                'id_teacher' => $teacherId,
            ]);
        }

    }

    public function editAction()
    {
        $teacher = new Teacher();
        $classes = new SchoolClass();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $teachers = $teacher->findAll();
            $classId = $_GET['id'];
            $classSchool = $classes->findOne($classId);
            $numberClass = $classSchool['number'];
            $teacherId = $classSchool['id_teacher'];

            $this->set(compact('teachers', 'numberClass', 'teacherId', 'classId'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $classId = $_GET['id'];

            $numberClass = $_POST['numberClass'];
            $teacherId = $_POST['teacherId'];

            $classes = new SchoolClass();
            $classes->updateBy('id', $classId, [
                'number' => $numberClass,
                'id_teacher' => $teacherId,
            ]);

            header('Location: /classes/index');
        }
    }

    public function oneAction()
    {
        $classNumber = $_GET['number'];
        $classes = new SchoolClass();
        $teacher = new Teacher();

        $classSchool = $classes->findOne($classNumber, 'number');
        $objectTeacher = $teacher->findOne($classSchool['id_teacher']);
        $objectClass = [
            'classId' => $classSchool['id'],
            'numberClass' => $classSchool['number'],
            'teacher' => $objectTeacher,
        ];


        $this->set(compact('objectClass'));
    }

    public function dropAction()
    {
        $classes = new SchoolClass();

        $classId = $_GET['id'];

        $classes->deleteBy('id', $classId);

        # перенаправление на /classes/index
        header('Location: /classes/index');
    }

}