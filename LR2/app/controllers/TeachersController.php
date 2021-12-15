<?php

namespace app\controllers;

use app\models\Teacher;

class TeachersController extends AppController
{
    public function indexAction()
    {

    }

    public function tableOutputAction()
    {
        # получение моделей данных
        $teacher = new Teacher();

        $teachers = $teacher->findAll();

        $teacherSchool = array();

        foreach ($teachers as $teacher) {
            $objectTeacher = [
                'teacherId' => $teacher['id'],
                'nameTeacher' => $teacher['name'],
            ];

            $teacherSchool[] = $objectTeacher;
        }

        $this->set(compact('teacherSchool'));
    }

    public function createAction()
    {
        $teacher = new Teacher();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $teachers = $teacher->findAll();
            $this->set(compact('teachers'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teacherName = $_POST['teacherName'];

            $teacher->add(['name' => $teacherName]);
            header('Location: /teachers/index');
        }

    }

    public function editAction()
    {
        $newTeacher = new Teacher();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $teacherId = $_GET['id'];
            $teacher = $newTeacher->findOne($teacherId);
            $teacherName = $teacher['name'];

            $this->set(compact('teacherId', 'teacherName'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teacherId = $_GET['id'];
            $teacherName = $_POST['teacherName'];
            $newTeacher = new Teacher();
            $newTeacher->updateBy('id', $teacherId, [
                'name' => $teacherName,
            ]);

            header('Location: /teachers/index');
        }
    }
    # поиск по фамилии/имени/отчеству
    public function oneAction()
    {
        $teacherName = $_GET['name'];

        $teachers = new Teacher();
        $foundTeachers = $teachers->findLike($teacherName, 'name');

        $listTeacher = array();
        foreach ($foundTeachers as $teacher) {
            $objectTeacher = [
                'teacherId' => $teacher['id'],
                'teacherName' => $teacher['name'],
            ];

            $listTeacher[] = $objectTeacher;
        }

        $this->set(compact('listTeacher'));
    }

    public function dropAction()
    {
        $teachers = new Teacher();

        $teacherId = $_GET['id'];

        $teachers->deleteBy('id', $teacherId);

        header('Location: /teachers/index');
    }


}