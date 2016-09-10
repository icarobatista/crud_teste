<!DOCTYPE html>
<html lang="en" data-ng-app="todoApp">
<head>
    <title>Pisyek Demo Todo App with CodeIgniter + AngularJS</title>

    <!-- Bootstrap core CSS -->
    <link href="http://demo.pisyek.com/todo-app/asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://demo.pisyek.com/todo-app/asset/css/app.css" rel="stylesheet">

</head>

<body data-ng-controller="TodoCtrl">


<form role="form" ng-submit="addTask()">


    <div class="form-group col-md-10">
        <input type="text" class="form-control" name="title" ng-model="taskTitle" placeholder="Enter task title" required>
    </div>




    <button type="submit" class="btn btn-default">Add task</button>


    <table>


        <tr data-ng-repeat="task in tasks track by $index">


            <td>{{ $index + 1 }}</td>



            <td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].title"></td>



            <td style="text-align:center"><input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])"ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'"></td>



            <td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteTask(tasks[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>


        </tr>


    </table>
</form>

<script src="ng/angular.min.js"></script>
<script src="ng/app.js"></script>
</body>
</html>