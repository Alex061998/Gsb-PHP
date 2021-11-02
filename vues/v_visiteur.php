<div class="contnue">

    <form name="Numéro" method="POST" action="index.php?uc=controleur&action=afficher">
        <h1> Visiteur </h1>
            <label> Numéro
                <select name="idVisiteur" required style="width: 150px">
                    
                    <option selected> <?= (isset($id))? $id : 'Visiteur'?></option>
                    <?php foreach ($lesVisiteurs as $unVisiteur): ?>
                    <option value="<?= $unVisiteur['id'] ?>"> <?= $unVisiteur['id'] ?> </option>
                    <?php endforeach; ?>

                </select>
                
            </label>
                    <input type="submit" name="Valider" value="Recherche">