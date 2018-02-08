

<style type="text/css">

body {
    margin: 0px;
}
p, td, span, li, a { 
    font-family: calibri light; 
}
h1 {
    font: 13pt calibri light;
    font-weight: bold;
    margin: 0 0 5px 0;
}
h2 {
    border-bottom: 1px solid #666;
    clear: both;
    font: 10pt calibri light;
    font-weight: bold;
    margin: 15px 0 10px 0;
    padding: 0 0 3px 0;
    width: 100%;
}
h3 {
    font: 10pt calibri light;
    font-weight: bold;
    margin: 0 0 2px 0;
    padding: 0;
}
li {
    font-size: 9pt;
    margin: 0 0 3px 5%;
    padding: 0;
}
p {
    font-size: 9pt;
    margin: 0 0 10px 0;
    padding: 0;
}
body ul {
    margin: 0 0 0 20%;
    padding: 0;
}
body div ul {
    margin: 3px 0 0 0;
    padding: 0;
}
#bio_left {
    font-size: 10pt;
    float: left;
    width: 50%;
}
#bio_right {
    font-size: 10pt;
    float: left;
    text-align: right;
    width: 50%;
}
.company {
    clear: both;
    margin: 0 0 5px 0;
    padding: 0;
}
.data {
    padding-left: 20%;
}
.date {
    clear: left;
    float: left;
    padding-top: 2px;
    width: 20%;
}
.job {
    clear: both;
    width: 100%;
}
.job_data {
    float: left;
    width: 80%;
}
.location {
    clear: right;
    float: right;
    text-align: right;
    width: 20%;
}
.position {
    font-style: italic;
    margin: 0 0 5px 0;
}
#references {
    margin-top: 20px;
}
#meta {
    display: none;
}
 
</style>

<h1>Cité Universitaire</h1>

<p id="bio_left">(+212) 5 35 56 78 98<br><a href="mailto:cite.universitaire@gov.ma">cite.universitaire@gov.ma</a>
</p>
<p id="bio_right">Adresse Cite<br>Maroc</p>

<br><br>
<h2>Information Personnel :</h2>
<div class="job">
    <p class="date">Nom et Prenom :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->nom }} {{ Auth::user()->dossier->prenom }} </h3>
    </div>
</div>

<div class="job">
    <p class="date">CIN :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->cin }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">CNE :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->cne }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Lieu de Naissance :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->lieu_naissance }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Date de Naissance :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->date_naissance }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Telephone :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->telephone }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Sex :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->genre }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Maladie Chronique :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->maladie }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Handicapé :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->handicape }}</h3>
    </div>
</div>

<br><br>
<h2>Votre Localisation :</h2>

<div class="job">
    <p class="date">Adresse :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->adresse }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Ville :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->ville->ville }}</h3>
    </div>
</div>


<br><br>
<h2>Votre Etude en Bac :</h2>

<div class="job">
    <p class="date">Année d'obtention du Bac :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->annee_bac }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Mention:</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->mention }}</h3>
    </div>
</div>

<h2>Votre Inscription Universitaire :</h2>

<div class="job">
    <p class="date">Etablissement :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->etablissement }}</h3>
    </div>
</div>

<div class="job">
    <p class="date">Cycle:</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->cycle }}</h3>
    </div>
</div>

<h2>Information des parents :</h2>

<div class="job">
    <p class="date">Nom du Père :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->nom_pere }}</h3>
    </div>
</div>

<div class="job">
    <p class="date"> CIN du Père :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->cin_pere }}</h3>
    </div>
</div>

<div class="job">
    <p class="date"> Nom du Mère :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->nom_mere }}</h3>
    </div>
</div>

<div class="job">
    <p class="date"> CIN du Mère :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->cin_mere }}</h3>
    </div>
</div>

<div class="job">
    <p class="date"> Revenue :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->revenue }}</h3>
    </div>
</div>

<div class="job">
    <p class="date"> Nombres Des Enfants :</p>
    <div class="job_data">
        <h3>{{ Auth::user()->dossier->nb_enfants }}</h3>
    </div>
</div>


<br><br>






<p style="float: right" id="references">Signature :</p>
