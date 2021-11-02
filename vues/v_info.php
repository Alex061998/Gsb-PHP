        <h2> Frais au forfait </h2>
            <table class="table" border="2" cellpadding="2">
                <tr>
                    <th>Mois</th>
                    <th>Repas midi</th>
                    <th>Nuité</th>
                    <th>Etape</th>
                    <th>Km</th>
                    <th>Situation</th>
                    <th>Date opération</th>
                    <th>Remboursement</th>
                </tr>

                <?php foreach ($fraisF as $unVisiteur): ?>
                    <tr>
                        <td><?= $unVisiteur['mois'];?></td>
                        <td><?= $unVisiteur['REP'];?></td>
                        <td><?= $unVisiteur['NUI'];?></td>
                        <td><?= $unVisiteur['ETP'];?></td>
                        <td><?= $unVisiteur['KM'];?></td>
                        <td><?= $unVisiteur['idEtat'];?></td>
                        <td><?= $unVisiteur['dateModif'];?></td>
                        <td><?= $unVisiteur['libelle']?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        <h2>Hors Forfait</h2>
        <div>
            <table class="table" border="2" cellpadding="2">
                <tr>
                    <th>Mois</th>
                    <th>Libellé</th>
                    <th>Montant</th>
                    <th>Situation</th>
                    <th>Date opératiton</th>
                </tr>
                <?php foreach ($fraisHorsF as $unVisiteur): ?>
                    <tr>
                        <td><?= $unVisiteur['mois']?></td>
                        <td><?= $unVisiteur['idVisiteur']?></td>
                        <td><?= $unVisiteur['montantValide']?></td>
                        <td><?= $unVisiteur['idEtat']?></td>
                        <td><?= $unVisiteur['dateModif']?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>

    </div>
</form>
    