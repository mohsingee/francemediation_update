@extends('frontend.layouts.app')
@section('title','About us PAGE')
@section('main-content')
    <div role="main" class="main">

        <section class="page-header page-header-classic page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 data-title-border>Form One</h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 align-self-center">
                        <ul class="breadcrumb d-block text-md-end">
                            <li><a href="index.html">Accueil</a></li>
                            <li class="active">Form One</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="card card-admin">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! $message !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php Session::forget('success');?>
                        @endif
        
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {!! $message !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php Session::forget('error');?>
                        @endif
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
                                Formation (informations requises via le formulaire)
                            </h2>
                        </header>
                        <div class="card-body">
                            <form action="{{route('submit.formation')}}" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start">Civilit??</label>
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

                                <h4 class="text-lg-start">Identit??</h4>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Nom</label
                                    >
                                    <div class="col-lg-6">
                                        <input
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
                                    >pr??nom</label
                                    >
                                    <div class="col-lg-6">
                                        <input
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
                                            type="text"
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
                                    >Compl??ment d'adresse</label
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
                                    >Num??ro de t??l??phone portable
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
                                            >Salari?? Ind??pendant</label
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
                                            > Retrait??</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="professional_situation"
                                                   value="Company" />
                                            <label for="checkboxExample5"> Soci??t?? </label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>




                                <h4 class="text-lg-start">Exp??rience professionnelle:</h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    >Exp??rience professionnelle</label
                                    >
                                    <div class="col-lg-6">
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox1"
                                                name="professional_experience"
                                                value="1 to 5 years"
                                            />
                                            1 ?? 5 ans
                                        </label>
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox2"
                                                name="professional_experience"
                                                value="5 to 10 years"
                                            />
                                            5 ?? 10 ans
                                        </label>
                                        <label class="checkbox-inline">
                                            <input
                                                type="radio"
                                                id="inlineCheckbox3"
                                                name="professional_experience"
                                                value="More than 10 years"
                                            />
                                            de 10 ?? ans
                                        </label>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">Profession</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez s??lectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select name="company_workforce" class="form-control mb-3">
                                            <option value="" disabled selected>
                                                Effectif de votre entreprise (le cas ??ch??ant)
                                            </option>
                                            <option value="0 to 5">0 ?? 5</option>
                                            <option value="4 to 49">4 ?? 49</option>
                                            <option value="More than 50">+ De 50</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>


                                <h4 class="text-lg-start">Adresse professionnelle</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez s??lectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select name="" class="form-control mb-3">
                                            <!-- <option value="" disabled selected>Veuillez s??lectionner</option> -->
                                            <option>Adresse</option>
                                            <option>Rue</option>
                                            <option>Compl??ment d'adresse</option>
                                            <option>Ville</option>
                                            <option>Code postal</option>
                                            <option>Pays</option>
                                            <option>Num??ro Siret</option>
                                            <option>Num??ro APE</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Nom de la personne en charge de votre dossier de formation
                                </h4>
                                <h6 class="text-lg-start">
                                    Coordonn??es de la personne en charge de votre dossier de
                                    formation
                                </h6>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >T??l??phone</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="charge_person_phone"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >adresse e-mail</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="charge_person_email"
                                        />
                                    </div>
                                    <div class="col-lg-4">


                                    </div>
                                </div>

                                <h4 class="text-lg-start">Modalit??s de financement</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start"
                                    >Avez-vous re??u un code formation ?</label
                                    >
                                    <div class="col-lg-6">
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="received_code"
                                                id="optionsRadios1"
                                                value="yes"
                                                checked=""
                                            />
                                            Oui
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                                type="radio"
                                                name="received_code"
                                                id="optionsRadios2"
                                                value="no"
                                            />
                                            Non
                                        </label>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>

                                    <h6 class=" text-lg-start">
                                        Ce code vous a peut-??tre ??t?? adress?? via une de nos
                                        communications e-mail / fax / SMS / r??seaux sociaux
                                    </h6>
                                </div>

                                <h4 class=" text-lg-start">
                                    Type de tarification envisag??e pour votre projet de
                                    formation
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label"></label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="price_of_training_project"
                                                value="Compte personnel de formation (CPF)"
                                            />
                                            <label for="checkboxExample1"
                                            >Compte personnel de formation (CPF)</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                                   value="OPCO (nom de l???organisme de financement)"/>
                                            <label for="checkboxExample2"
                                            >OPCO (nom de l???organisme de financement)</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                                   value="P??le emploi"/>
                                            <label for="checkboxExample3">P??le emploi</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                                   value="Agence r??gionale de transition Pro" />
                                            <label for="checkboxExample4"
                                            >Agence r??gionale de transition Pro</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                                   value="Fonds propres" />
                                            <label for="checkboxExample5">Fonds propres </label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                                   value="Entreprises"/>
                                            <label for="checkboxExample6">Entreprises </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>



                                <h4 class="text-lg-start">Votre projet de formation</h4>
                                <h6 class="text-lg-start">Lettre de motivation</h6>

                                <label class="col-lg-2 control-label text-lg-start pt-2"
                                >File Upload</label
                                >
                                <div class="col-lg-6">

                                    <div
                                        class="fileupload fileupload-new"
                                        data-provides="fileupload"
                                    >
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="cover_letter" required/>
                              </span>
                                        </div>
                                    </div>
                                </div>
                                <p> Joindre une lettre de motivation est obligatoire pour
                                    l'examen de votre candidature. Les formats accept??s
                                    sont les suivants : .doc, .docx (Word), .pdf, .rtf.
                                    Taille maximale : 5 Mo.
                                </p>
                                <div class="col-lg-4">

                                </div>



                                <h6 class="text-lg-start">Photo</h6>

                                <label class="col-lg-2 control-label text-lg-start pt-2"
                                >File Upload</label
                                >
                                <div class="col-lg-6">

                                    <div
                                        class="fileupload fileupload-new"
                                        data-provides="fileupload"
                                    >
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="photo" required/>
                              </span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Joindre une photo pour constituer votre dossier. Les
                                    formats accept??s sont les suivants : jpg, gif, png.
                                    Taille maximale du fichier :10 Mo.
                                </p>
                                <div class="col-lg-4">

                                </div>



                                <h6 class="text-lg-start">Curriculum Vitae</h6>

                                <label class="col-lg-2 control-label text-lg-start pt-2"
                                >File Upload</label
                                >
                                <div class="col-lg-6">

                                    <div
                                        class="fileupload fileupload-new"
                                        data-provides="fileupload"
                                    >
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Change</span>
                                <span class="fileupload-new">Select file</span>
                                <input type="file" name="cv" required/>
                              </span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Un CV ?? jour est n??cessaire ?? l'examen de votre
                                    dossier. Les formats accept??s sont les suivants :
                                    .doc, .docx (Word), .pdf, .rtf. Taille maximale : 5
                                    Mo.
                                </p>
                                <div class="col-lg-4">

                                </div>

                                <h4 class="text-lg-start">Lieu / ville(s) de formation</h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez s??lectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select name="training_city" class="form-control mb-3">
                                            <!-- <option value="" disabled selected>Veuillez s??lectionner</option> -->
                                            <option value="Paris">Paris</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Ville">Ville</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <h4 class="text-lg-start">
                                    Distanciel (en visio et classe virtuelle)
                                </h4>
                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label text-lg-start pt-2"
                                    >Veuillez s??lectionner</label
                                    >
                                    <div class="col-lg-6">
                                        <select name="remote_class" class="form-control mb-3">
                                            <!-- <option value="" disabled selected>Veuillez s??lectionner</option> -->
                                            <option value="Paris">Paris</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Ville">Ville</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">Date de d??marrage souhait??e</h4>
                                <h6 class="text-lg-start">
                                    Reportez-vous au calendrier de formation de la ville de
                                    votre choix ou indiquez une date approximative.
                                </h6>
                                <div class="form-group row pb-4 has-success">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="inputSuccess"
                                    >Date de d??marrage souhait??e</label
                                    >
                                    <div class="col-lg-6">
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="inputSuccess"
                                            name="desired_start_date"
                                        />
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>

                                <h4 class="text-lg-start">
                                    Comment avez-vous connu France M??diation Tous Jours ?
                                </h4>

                                <div class="form-group row pb-4">
                                    <label class="col-lg-2 control-label"></label>

                                    <div class="col-lg-6">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input
                                                type="radio"
                                                checked=""
                                                id="checkboxExample2"
                                                name="how_find_us"
                                                value="Le site internet de France M??diation tous jours"
                                            />
                                            <label for="checkboxExample1"
                                            >Le site internet de France M??diation tous
                                                jours</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                                   value="Les r??seaux sociaux"/>
                                            <label for="checkboxExample2"
                                            >Les r??seaux sociaux</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                                   value="Presse ??crite" />
                                            <label for="checkboxExample3">Presse ??crite</label>
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2"  name="how_find_us"
                                                   value="Le bouche ?? oreilles"/>
                                            <label for="checkboxExample4"
                                            >Le bouche ?? oreilles</label
                                            >
                                        </div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                                   value="Autre" />
                                            <label for="checkboxExample5">Autre </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>

                                <div class="form-group row pb-4">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="textareaDefault"
                                    ></label>
                                    <div class="col-lg-6">
                          <textarea
                              class="form-control"
                              placeholder="Dites-en nous plus"
                              rows="3"
                              id="textareaDefault"
                              name="how_find_us_other"
                          ></textarea>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <h4 class="text-lg-start">
                                    Vous pouvez pr??ciser votre projet dans cet espace
                                </h4>
                                <div class="form-group row pb-4">
                                    <label
                                        class="col-lg-2 control-label text-lg-start pt-2"
                                        for="textareaDefault"
                                    ></label>
                                    <div class="col-lg-6">
                          <textarea
                              class="form-control"
                              placeholder="Dites-en nous plus"
                              rows="3"
                              id="textareaDefault"
                              name="project_detail"
                          ></textarea>
                                    </div>
                                    <div class="col-lg-6">

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
