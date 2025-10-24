<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include "components/components_navbar.php"; ?>
    <main class="container">
        <header>
            <h1>Règlement Officiel du ChocoBLAST 🍫</h1>
            <p><em>Version du 23 janvier 2020 – Reconnu d’utilité publique</em></p>
            <hr>
        </header>

        <section>
            <h2>Les joueurs</h2>
            <ul>
                <li>Toute personne ayant été avertie par voie orale ou écrite est susceptible d’être ChocoBLASTée.</li>
                <li>Toute personne ayant mangé des chocolatines (ou pains au chocolat pour les non-initiés) ou croissants lors d’un paiement est automatiquement considérée comme joueur.</li>
            </ul>
        </section>

        <section>
            <h2>L’élément de base</h2>
            <ul>
                <li>Un ChocoBLASTage est valable à partir du moment où le compte envoie au moins un mail à au moins deux membres du groupe.</li>
                <li>La victime doit amener au moins une chocolatine par personne présente dans la liste de diffusion.</li>
                <li>Le ChocoBLASTeur et le ChocoBLASTé doivent être inclus dans la liste de diffusion.</li>
                <li>Le message du ChocoBLAST doit être explicite dans son objet ou son contenu.</li>
                <li>Si le ChocoBLASTeur est pris en flagrant délit, il devient le ChocoBLASTé et doit apporter dès le lendemain des croissants et chocolatines.</li>
                <li>Tout moyen de communication authentifié peut être utilisé, sauf exceptions listées ci-dessous.</li>
            </ul>
        </section>

        <section>
            <h2>Les interdictions</h2>
            <ul>
                <li>Interdiction d’utiliser un poste non verrouillable.</li>
                <li>Interdiction de ChocoBLASTer une personne encore présente dans la pièce.</li>
                <li>Interdiction d’envoyer un ChocoBLAST via un outil de prise en main à distance, sauf si le mot de passe est celui par défaut.</li>
                <li>Interdiction d’utiliser le compte Unix d’un joueur, sauf si mot de passe par défaut (alors c’est conseillé 😉).</li>
                <li>Il est interdit de protéger une personne en verrouillant sa session : le protecteur devient ChocoBLASTé !</li>
                <li>Pas de règles ou macros bloquant l’envoi de ChocoBLAST.</li>
                <li>Pas d’envoi via smartphone d’un joueur.</li>
                <li>Un mail non envoyé par le ChocoBLASTé n’est pas valide. En cas de désignation abusive, la personne fautive devra payer double.</li>
            </ul>
        </section>

        <section>
            <h2>Le paiement</h2>
            <ul>
                <li>Le ChocoBLASTé dispose de dix jours ouvrés pour payer son amende.</li>
                <li>Un ChocoBLASTage prévu sous forme de réunion ne peut être reporté qu’en cas de force majeure avec justificatif maternel.</li>
                <li>Si la victime ne s’aperçoit pas de son ChocoBLASTage le jour même, la quantité de chocolatines augmente.</li>
                <li>Pas de chocolatines ? Les croissants comptent pour une demi-sanction.</li>
                <li>En cas de régime (surconsommation de beurre/chocolat), des fruits peuvent accompagner la sanction, mais elle doit contenir un élément chocolaté.</li>
                <li>En cas de non-paiement à la date prévue : paiement doublé.</li>
                <li>Se dire « inChocoBLASTable » entraîne une sanction quadruplée en cas d’échec.</li>
                <li>Les victimes bretonnes doivent apporter des crêpes au Nutella (avec chantilly si vêtues de jaune 🌧️).</li>
                <li>Faire croire à un faux ChocoBLAST rend automatiquement ChocoBLASTé.</li>
            </ul>
        </section>

        <section>
            <h2>Règles de vie et bon sens</h2>
            <p>Entre deux ChocoBLASTages d’une même personne, un délai de battement est imposé :</p>
            <ul>
                <li>2 à 10 personnes : 1 semaine</li>
                <li>11 à 20 personnes : 2 semaines</li>
                <li>21 à 30 personnes : 3 semaines</li>
            </ul>
            <p>Si le ChocoBLASTé est encore dans une période de battement, son paiement est reporté à la fin de celle-ci.</p>
        </section>

        <section>
            <h2>Les litiges</h2>
            <p>En cas de désaccord, un comité ChocoBLAST se réunira pour trancher en toute bienveillance.</p>
        </section>

        <section>
            <h2>La générosité</h2>
            <ul>
                <li>Tout joueur peut offrir spontanément des chocolatines (prévenir 24 h à l’avance pour éviter les doublons).</li>
                <li>La générosité ne dispense jamais d’un paiement.</li>
            </ul>
        </section>

        <section>
            <h2>Auto-ChocoBLASTage</h2>
            <p>Offrir des chocolatines pour une raison festive ou personnelle (anniversaire, pot de départ, etc.) entretient l’esprit du ChocoBLAST 🎉.</p>
        </section>

        <section>
            <h2>Délation</h2>
            <p>La délation, c’est mal ! 😈<br>
                La ChocoPOLICE veille. Le délateur subit une double punition.</p>
        </section>

        <section>
            <h2>Reports</h2>
            <p>En cas d’indisponibilité (maladie, congés…), le paiement peut être reporté dans les dix jours suivants la date initiale.</p>
        </section>


    </main>
    <?php include "components/components_footer.php"; ?>
</body>

</html>