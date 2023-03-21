@extends('layouts.app')
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Mediator</h2>
                    @if ($errors->any())
                        <div class="validation error">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true" id="cross">×</span></button>
                            <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('mediator.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="validation error">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true" id="cross">×</span></button>
                                        <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br />
                                        @endforeach
                                    </div>
                                @endif
                                        <div class="row" >
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 control-label text-lg-start">Civilité</label>
                                                    <div class="col-lg-10">
                                                        <label class="checkbox-inline">
                                                            <input
                                                                type="radio"
                                                                id="inlineCheckbox1"
                                                                value="Madame"
                                                                name="civility"
                                                                @if($user->civility == 'Madame')
                                                                    checked
                                                                @endif
                                                            />
                                                            Madame
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input
                                                                type="radio"
                                                                id="inlineCheckbox2"
                                                                value="Monsieur"
                                                                name="civility"
                                                                @if($user->civility == 'Monsieur')
                                                                    checked
                                                                @endif
                                                            />
                                                            Monsieur
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Identité</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start pt-2"
                                                        for="inputSuccess"
                                                    >Nom</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            required
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="first_name"
                                                            value="{{ $user->first_name }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >prénom</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            required
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="last_name"
                                                            value="{{ $user->last_name }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Date de naissance
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="dob"
                                                            value="{{ $user->dob }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Adresse e-mail</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            required
                                                            type="email"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="email"
                                                            value="{{ $user->email }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Adresse postale personnelle
                                                    </label>
                                                    <div class="col-md-7">
                                                        <input
                                                            required
                                                            type="email"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="personal_email"
                                                            value="{{ $user->personal_email }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Adresse</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="address"
                                                            value="{{ $user->address }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Rue</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="street"
                                                            value="{{ $user->street }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>                    
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Complément d'adresse</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="additional_address"
                                                            value="{{ $user->additional_address }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Ville</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="city"
                                                            value="{{ $user->city }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Region</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
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
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                        <select name="region" required class="form-control show-tick ms select2">
                                                            <option value="" disabled selected>
                                                                Choisissez une région
                                                            </option>
                                                            <?php foreach($regions as $key => $region) {?>
                                                                <option value="<?php echo $key;?>" @if($user->redion == $key) selected @endif><?php echo $region;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Code postal</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="postal_code"
                                                            value="{{ $user->postal_code }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Pays</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="country"
                                                            value="{{ $user->country }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Numéro de téléphone portable</label
                                                    >
                                                    <div class="col-md-7">
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="phone_number"
                                                            value="{{ $user->phone_number }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Situation professionnelle</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Situation professionnelle</label
                                                    >
                                                    <div class="col-md-7">
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input
                                                                type="radio"
                                                                id="checkboxExample2"
                                                                name="professional_situation"
                                                                value="Independent employee"
                                                                @if($user->professional_situation =="Independent employee")
                                                                    checked
                                                                @endif
                                                            />
                                                            <label for="checkboxExample1"
                                                            >Salarié Indépendant</label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                                   value="Entrepreneur" 
                                                                @if($user->professional_situation =="Entrepreneur")
                                                                    checked
                                                                @endif/>
                                                            <label for="checkboxExample2"
                                                            > Chef d'entreprise</label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                                   value="Jobseeker"
                                                                @if($user->professional_situation =="Jobseeker")
                                                                    checked
                                                                @endif/>
                                                            <label for="checkboxExample3">Demandeur d'emploi</label>
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                                   value="Retreat" 
                                                                @if($user->professional_situation =="Retreat")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample4"
                                                            > Retraité</label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                                   value="Company" 
                                                                @if($user->professional_situation =="Company")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample5"> Société </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Expérience professionnelle:</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start pt-2"
                                                        for="inputSuccess"
                                                    >Expérience professionnelle</label
                                                    >
                                                    <div class="col-md-7">
                                                        <label class="checkbox-inline">
                                                            <input
                                                                type="radio"
                                                                id="inlineCheckbox1"
                                                                name="professional_experience"
                                                                value="1 to 5 years"
                                                                @if($user->professional_experience =="1 to 5 years")
                                                                   checked
                                                               @endif
                                                            />
                                                            1 à 5 ans
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input
                                                                type="radio"
                                                                id="inlineCheckbox2"
                                                                name="professional_experience"
                                                                value="5 to 10 years"
                                                                @if($user->professional_experience =="5 to 10 years")
                                                                   checked
                                                               @endif
                                                            />
                                                            5 à 10 ans
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input
                                                                type="radio"
                                                                id="inlineCheckbox3"
                                                                name="professional_experience"
                                                                value="More than 10 years"
                                                                @if($user->professional_experience =="More than 10 years")
                                                                   checked
                                                               @endif
                                                            />
                                                            de 10 à ans
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Profession</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Veuillez sélectionner</label
                                                    >
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <select name="work_force" class="form-control show-tick ms select2">
                                                                <option value="" disabled selected>
                                                                    Effectif de votre entreprise (le cas échéant)
                                                                </option>
                                                                <option value="0 to 5" @if($user->work_force =="0 to 5") selected @endif>0 à 5</option>
                                                                <option value="4 to 49" @if($user->work_force =="4 to 49") selected @endif>4 à 49</option>
                                                                <option value="More than 50" @if($user->work_force =="More than 50") selected @endif>+ De 50</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Adresse professionnelle</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Veuillez sélectionner</label
                                                    >
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <select class="form-control show-tick ms select2">
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
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Profil</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Photo de profil</label
                                                    >
                                                    <div class="col-md-5">
                                                        <input type="file" name="profile" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="{{ asset('assets/profile/'.$user->profile) }}" alt="" width="90" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Diplômes-certification : Année d’obtention :</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Expérience en qualité de Médiateur professionnel</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Expérience en qualité de Médiateur
                                                    professionnel</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input
                                                                type="radio"
                                                                checked=""
                                                                id="checkboxExample2"
                                                                name="mediator_expereince"
                                                                value="1 à 5 ans"
                                                                @if($user->mediator_expereince =="1 à 5 ans")
                                                                   checked
                                                               @endif
                                                            />
                                                            <label for="checkboxExample1"
                                                            >1 à 5 ans </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="mediator_expereince"
                                                                   value="5 à 10 ans"
                                                                   @if($user->mediator_expereince =="5 à 10 ans")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample2"
                                                            > 5 à 10 ans </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="mediator_expereince"
                                                                   value="+ de 10 ans"
                                                                   @if($user->mediator_expereince =="+ de 10 ans")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">+ de 10 ans</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Nombre de médiations conventionnelles réalisées au cours des trois dernières années</h4>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <div class="form-group row  has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start pt-2"
                                                        for="inputSuccess"
                                                    >Dans quels domaines ?</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input
                                                                type="radio"
                                                                checked=""
                                                                id="checkboxExample2"
                                                                name="conventional_mediation"
                                                                value="civil"
                                                                @if($user->conventional_mediation =="civil")
                                                                checked
                                                            @endif
                                                            />
                                                            <label for="checkboxExample1"
                                                            >civil </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                                   value="social"
                                                                   @if($user->conventional_mediation =="social")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample2"
                                                            > social </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                                   value="commercial"
                                                                   @if($user->conventional_mediation =="commercial")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">commercial</label>
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                                   value="Successoral"
                                                                   @if($user->conventional_mediation =="Successoral")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">Successoral</label>
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="conventional_mediation"
                                                                   value="familial"
                                                                   @if($user->conventional_mediation =="familial")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">familial</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Nombre de médiations judiciaires réalisées au cours des trois dernières années</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row  has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start pt-2"
                                                        for="inputSuccess"
                                                    >Dans quels domaines ?</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input
                                                                type="radio"
                                                                checked=""
                                                                id="checkboxExample2"
                                                                name="judicial_mediation"
                                                                value="civil"
                                                                @if($user->judicial_mediation =="civil")
                                                                checked
                                                            @endif
                                                            />
                                                            <label for="checkboxExample1"
                                                            >civil </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                                   value="social"
                                                                   @if($user->judicial_mediation =="social")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample2"
                                                            > social </label
                                                            >
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                                   value="commercial"
                                                                   @if($user->judicial_mediation =="commercial")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">commercial</label>
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                                   value="Successoral"
                                                                   @if($user->judicial_mediation =="Successoral")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">Successoral</label>
                                                        </div>
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="radio" id="checkboxExample2" name="judicial_mediation"
                                                                   value="familial"
                                                                   @if($user->judicial_mediation =="familial")
                                                                   checked
                                                               @endif/>
                                                            <label for="checkboxExample3">familial</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Assurance responsabilité civile souscrite pour l’activité de médiation</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >nom de l'assureur</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                            name="name_of_insurer"
                                                            value="{{ $user->name_of_insurer }}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >numéro de la police</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            id="inputSuccess"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Adhérente des fédérations/organismes/associations de médiation</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Lesquels</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="member_of_mediation"
                                                                id="optionsRadios1"
                                                                value="Oui"
                                                                @if($user->member_of_mediation =="Oui")
                                                                   checked
                                                               @endif
                                                            />
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="member_of_mediation"
                                                                id="optionsRadios2"
                                                                value="Non"
                                                                @if($user->member_of_mediation =="Non")
                                                                   checked
                                                               @endif
                                                            />
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">Inscription sur la liste de cours d’appel</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start"
                                                        for="inputSuccess"
                                                    >Lesquels</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="appeal_court"
                                                                id="optionsRadios1"
                                                                value="Oui"
                                                                @if($user->appeal_court =="Oui")
                                                                   checked
                                                               @endif
                                                            />
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="appeal_court"
                                                                id="optionsRadios2"
                                                                value="Non"
                                                                @if($user->appeal_court =="Non")
                                                                   checked
                                                               @endif
                                                            />
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4 class="text-lg-start">dépôt d’un dossier, actuellement à l’étude Cour d’Appel de la région</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row  has-success">
                                                    <label
                                                        class="col-md-3 control-label text-lg-start pt-2"
                                                        for="inputSuccess"
                                                    >Lesquels</label
                                                    >
                                                    <div class="col-md-7 mt-2">
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="apeal_of_region"
                                                                id="optionsRadios1"
                                                                value="Oui"
                                                                @if($user->apeal_of_region =="Oui")
                                                                   checked
                                                               @endif
                                                            />
                                                            Oui
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input
                                                                type="radio"
                                                                name="apeal_of_region"
                                                                id="optionsRadios2"
                                                                value="Non"
                                                                @if($user->apeal_of_region =="Non")
                                                                   checked
                                                               @endif
                                                            />
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions clearfix">
                                            <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                                                    Save changes
                                            </button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection