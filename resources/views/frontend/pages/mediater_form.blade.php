@extends('frontend.layouts.app')
@section('title','Registration PAGE')
@section('main-content')
    <div role="main" class="main">

        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Inscription des Médiateurs</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">Inscription des Médiateurs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="card card-admin">
                        <header class="card-header">
                            <div class="card-actions">
                                <a
                                    href="#"
                                    class="card-action card-action-toggle"
                                    data-card-toggle
                                ></a>
                                <a
                                    href="#"
                                    class="card-action card-action-dismiss"
                                    data-card-dismiss
                                ></a>
                            </div>

                            <h2 class="card-title">
                                Inscription des Médiateurs
                            </h2>
                        </header>
                        <div class="card-body">
                            <form action="{{route('submit.mediator')}}" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start">Civilité</label>
                                    <div class="col-lg-10">
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox1"
                                                value="Madame"
                                                name="civility"
                                            />
                                            Madame
                                        </label>
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox2"
                                                value="Monsieur"
                                                name="civility"
                                            />
                                            Monsieur
                                        </label>
                                    </div>
                                </div>

                                <h4 class="text-lg-start">Identité</h4>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Nom</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="first_name"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >prénom</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="last_name"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Date de naissance
                                    </label>
                                    <div class="col-lg-6">
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="dob"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Adresse e-mail</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            required
                                            type="email"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="email"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Adresse postale personnelle
                                    </label>
                                    <div class="col-lg-6">
                                        <input
                                            required
                                            type="email"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="personal_email"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Adresse</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="address"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Rue</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="street"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Complément d'adresse</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="additional_address"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Ville</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="city"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                                <h4 class="text-lg-start">Region</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Choisissez une région</label
                                    >
                                    <?php
                                    $regions = array (
                                        0 => 'Auvergne-rhone-alpes',
                                        1 => 'Bourgogne-Franche-Comté',
                                        2 => 'Bretagne',
                                        3 => 'Centre-Val de Loire',
                                        4 => 'Corse',
                                        5 => 'Grand-Est',
                                        6 => 'Guadeloupe',
                                        7 => 'Guyane',
                                        8 => 'Hauts-de-France',
                                        9 => 'Île-de-France',
                                        10 => 'Martinique',
                                        11 => 'Mayotte',
                                        12 => 'Normandie',
                                        13 => 'Nouvelle-Aquitaine',
                                        14 => 'Occitanie',
                                        15 => 'Pays de la Loire',
                                        16 => 'Provence-Alpes Côte d\'Azur',
                                        17 => 'Réunion',
                                    );
                                    ?>
                                    <div class="col-lg-6">
                                        <select name="region" required class="form-control mb-3">
                                            <option value="" disabled selected>
                                                Choisissez une région
                                            </option>
                                            <?php foreach($regions as $key => $region) {?>
                                                <option value="<?php echo $key;?>"><?php echo $region;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Code postal</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="postal_code"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Pays</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="country"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Numéro de téléphone portable
                                    </label>
                                    <div class="col-lg-6">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="phone_number"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">
                                    Situation professionnelle
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label">Situation professionnelle</label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="professional_situation"
                                                value="Independent employee"
                                            />
                                            <label for="checkboxExample1"
                                            >Salarié Indépendant</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                   value="Entrepreneur" />
                                            <label for="checkboxExample2"
                                            > Chef d'entreprise</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                   value="Jobseeker"/>
                                            <label for="checkboxExample3">Demandeur d'emploi</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                   value="Retreat" />
                                            <label for="checkboxExample4"
                                            > Retraité</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                   value="Company" />
                                            <label for="checkboxExample5"> Société </label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">Expérience professionnelle:</h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    >Expérience professionnelle</label
                                    >
                                    <div class="col-lg-6">
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox1"
                                                name="professional_experience"
                                                value="1 to 5 years"
                                            />
                                            1 à 5 ans
                                        </label>
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox2"
                                                name="professional_experience"
                                                value="5 to 10 years"
                                            />
                                            5 à 10 ans
                                        </label>
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox3"
                                                name="professional_experience"
                                                value="More than 10 years"
                                            />
                                            de 10 à ans
                                        </label>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">Profession</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez sélectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select name="work_force" class="form-control mb-3">
                                            <option value="" disabled selected>
                                                Effectif de votre entreprise (le cas échéant)
                                            </option>
                                            <option value="0 to 5">0 à 5</option>
                                            <option value="4 to 49">4 à 49</option>
                                            <option value="More than 50">+ De 50</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">Adresse professionnelle</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez sélectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select class="form-control mb-3">
                                            <!-- <option value="" disabled selected>Veuillez sélectionner</option> -->
                                            <option>Adresse</option>
                                            <option>Rue</option>
                                            <option>Complément d'adresse</option>
                                            <option>Ville</option>
                                            <option>Code postal</option>
                                            <option>Pays</option>
                                            <option>Numéro Siret</option>
                                            <option>Numéro APE</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">Profil</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Photo de profil</label
                                    >
                                    <div class="col-lg-6">
                                        <input type="file" name="profile" class="form-control mb-3" required>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Diplômes-certification : Année d’obtention :
                                </h4>


                                <h4 class="text-lg-start">
                                    Expérience en qualité de Médiateur professionnel
                                </h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label">Expérience en qualité de Médiateur
                                        professionnel</label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="mediator_expereince"
                                                value="1 à 5 ans"
                                            />
                                            <label for="checkboxExample1"
                                            >1 à 5 ans </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="mediator_expereince"
                                                   value="5 à 10 ans"/>
                                            <label for="checkboxExample2"
                                            > 5 à 10 ans </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="mediator_expereince"
                                                   value="+ de 10 ans"/>
                                            <label for="checkboxExample3">+ de 10 ans</label>
                                        </div>


                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Nombre de médiations conventionnelles réalisées au cours des trois dernières années
                                </h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label">Dans quels domaines ?</label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="conventional_mediation"
                                                value="civil"
                                            />
                                            <label for="checkboxExample1"
                                            >civil </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                   value="social"/>
                                            <label for="checkboxExample2"
                                            > social </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                   value="commercial"/>
                                            <label for="checkboxExample3">commercial</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                   value="Successoral"/>
                                            <label for="checkboxExample3">Successoral</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                   value="familial"/>
                                            <label for="checkboxExample3">familial</label>
                                        </div>


                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Nombre de médiations judiciaires réalisées au cours des trois dernières années
                                </h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label">Dans quels domaines ?</label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="judicial_mediation"
                                                value="civil"
                                            />
                                            <label for="checkboxExample1"
                                            >civil </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                   value="social"/>
                                            <label for="checkboxExample2"
                                            > social </label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                   value="commercial"/>
                                            <label for="checkboxExample3">commercial</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                   value="Successoral"/>
                                            <label for="checkboxExample3">Successoral</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                   value="familial"/>
                                            <label for="checkboxExample3">familial</label>
                                        </div>


                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Assurance responsabilité civile souscrite pour l’activité de médiation
                                </h4>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >nom de l'assureur</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="name_of_insurer"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >numéro de la police </label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="inputSuccess"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Adhérente des fédérations/organismes/associations de médiation
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    >Lesquels</label
                                    >
                                    <div class="col-lg-6">
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="member_of_mediation"
                                                id="optionsRadios1"
                                                value="Oui"
                                                checked=""
                                            />
                                            Oui
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="member_of_mediation"
                                                id="optionsRadios2"
                                                value="Non"
                                            />
                                            Non
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Inscription sur la liste de cours d’appel
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    >Lesquels</label
                                    >
                                    <div class="col-lg-6">
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="appeal_court"
                                                id="optionsRadios1"
                                                value="Oui"
                                                checked=""
                                            />
                                            Oui 
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="appeal_court"
                                                id="optionsRadios2"
                                                value="Non"
                                            />
                                            Non
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <h4 class="text-lg-start">
                                    dépôt d’un dossier, actuellement à l’étude Cour d’Appel de la région
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    ></label
                                    >
                                    <div class="col-lg-6">
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="apeal_of_region"
                                                id="optionsRadios1"
                                                value="Oui"
                                                checked=""
                                            />
                                            Oui
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="apeal_of_region"
                                                id="optionsRadios2"
                                                value="Non"
                                            />
                                            Non
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>

                                <div class="form-group col text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3"
                                        data-loading-text="Loading..."
                                    >
                                        Envoyer ma candidature
                                    </button>
                                </div>

                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>


    </div>
@endsection
