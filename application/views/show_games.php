/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 6:35 PM
 */
<?php foreach ($games as $game): ?>

    <h2><?php echo var_dump($game) ?></h2>
    <h2><?php echo var_dump($votes) ?></h2>

<?php endforeach ?>

<h2><?php echo var_dump($vote_success) ?></h2>