
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/style.css">
        
    </head>
    <body>
        <div class="container">
            <div class="wrapper py-3">

                <form action="#" method="POST">
                    <div class="row">
                        <div class="col">
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col">
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" id="role" aria-describedby="emailHelp" name="role" placeholder="Role" required>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
                
        <h1>User list</h1>
        <table class="table table-striped">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Created at</th>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?= (int)$id = $user->getId();?></td>
                        <td><?= $username = $user->getUsername();?></td>
                        <td><?= $role = $user->getRole();?></td>
                        <td><?= $createdAt = $user->getCreatedAt();?></td>
                        <td>
                            <form action="#" method="post">
                                <input type="hidden" name="id" value="<?php $user->getId()?>">
                                <input type="hidden" name="username" value="<?php $user->getUsername()?>">
                                <input type="hidden" name="role" value="<?php $user->getRole()?>">
                                <input type="hidden" name="createdAt" value="<?php $user->getCreatedAt()?>">
                                <button type="submit" class="btn btn-success">Info</button>
                            </form>
                        </td>
                        <td>
                            <form action="#" method="post">
                                <input type="hidden" name="action" value="update" >
                                <input type="hidden" name="id" value="<?= (int)$id;?>">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="#" method="post">
                                <input type="hidden" name="action" value="delete" >
                                <input type="hidden" name="id" value="<?= $id;?>">
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    <?php endforeach; var_dump($_POST);?>

                </tbody>
            </table>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>