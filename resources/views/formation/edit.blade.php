@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('formation.update',$user->id) }}" method="POST" enctype="multipart/form-data">
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
        <div class="card">
            <div class="card-body">
                <div class="row gutters" >
                    <div class="col-12">
                        <div class="form-group row pb-4">
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
                        <div class="form-group row pb-4 has-success">
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Situation professionnelle</label
                            >
                            <div class="col-md-7 mt-2">
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Expérience professionnelle</label
                            >
                            <div class="col-md-7">
                                <label class="checkbox-inline mt-2">
                                    <input type="radio" id="inlineCheckbox1" name="professional_experience" value="1 to 5 years" @if($user->professional_experience == "1 to 5 years") checked @endif />
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
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Veuillez sélectionner</label
                            >
                            <div class="col-md-7">
                                <select name="work_force" class="form-control mb-3">
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

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Adresse professionnelle</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Veuillez sélectionner</label
                            >
                            <div class="col-md-7">
                                <select class="form-control mb-3">
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

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Nom de la personne en charge de votre dossier de formation</h4>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Coordonnées de la personne en charge de votre dossier de
                            formation</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Téléphone</label
                            >
                            <div class="col-md-7 mt-2">
                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputSuccess"
                                    name="charge_person_phone"
                                    value="{{ $user->charge_person_phone }}"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >adresse e-mail</label
                            >
                            <div class="col-md-7 mt-2">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="inputSuccess"
                                    name="charge_person_email"
                                    value="{{ $user->charge_person_email }}"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Modalités de financement</h4>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Avez-vous reçu un code formation ?</label
                            >
                            <div class="col-md-7 mt-2">
                                <div class="checkbox-custom checkbox-primary">
                                    <input
                                        type="radio"
                                        name="received_code"
                                        id="optionsRadios1"
                                        value="yes"
                                        @if($user->received_code =="yes")
                                        checked
                                    @endif
                                    />
                                    <label for="checkboxExample1"
                                    >Oui </label
                                    >
                                </div>
                                <div class="checkbox-custom checkbox-primary">
                                    <input 
                                            type="radio"
                                            name="received_code"
                                            id="optionsRadios2"
                                            value="no"
                                           @if($user->received_code =="no")
                                           checked
                                       @endif/>
                                    <label for="checkboxExample2"
                                    > Non </label
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Ce code vous a peut-être été adressé via une de nos
                            communications e-mail / fax / SMS / réseaux sociaux</h4>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Type de tarification envisagée pour votre projet de
                            formation</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <div class="checkbox-custom checkbox-primary">
                                <input
                                    type="radio"
                                    id="checkboxExample2"
                                    name="price_of_training_project"
                                    value="Compte personnel de formation (CPF)"
                                    @if($user->price_of_training_project =="Compte personnel de formation (CPF)")
                                           checked
                                       @endif
                                />
                                <label for="checkboxExample1"
                                >Compte personnel de formation (CPF)</label
                                >
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                       value="OPCO (nom de l’organisme de financement)"
                                       @if($user->price_of_training_project =="OPCO (nom de l’organisme de financement)")
                                           checked
                                       @endif/>
                                <label for="checkboxExample2"
                                >OPCO (nom de l’organisme de financement)</label
                                >
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                       value="Pôle emploi"
                                       @if($user->price_of_training_project =="Pôle emploi")
                                       checked
                                   @endif/>
                                <label for="checkboxExample3">Pôle emploi</label>
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                       value="Agence régionale de transition Pro" 
                                       @if($user->price_of_training_project =="Agence régionale de transition Pro")
                                       checked
                                   @endif/>
                                <label for="checkboxExample4"
                                >Agence régionale de transition Pro</label
                                >
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                       value="Fonds propres" 
                                       @if($user->price_of_training_project =="Fonds propres")
                                       checked
                                   @endif/>
                                <label for="checkboxExample5">Fonds propres </label>
                            </div>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="radio" id="checkboxExample2" name="price_of_training_project"
                                       value="Entreprises"
                                       @if($user->price_of_training_project =="Entreprises")
                                       checked
                                   @endif/>
                                <label for="checkboxExample6">Entreprises </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Votre projet de formation</h4>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Lettre de motivation</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >File Upload</label
                            >
                            <div class="col-md-5 mt-2">
                                <input type="file" name="cover_letter" class="form-control"/>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('assets/profile/'.$user->cover_letter) }}" class="img-fluid" height="200" width="300">
                                <p> <a href="{{ asset('assets/profile/'.$user->cover_letter) }}" target="_blank"> <b> Click Here </b> </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Photo</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >File Upload</label
                            >
                            <div class="col-md-5 mt-2">
                                <input type="file" name="photo" class="form-control"/>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('assets/profile/'.$user->photo) }}" alt="" width="90" class="img-fluid">
                                <p> <a href="{{ asset('assets/profile/'.$user->photo) }}" target="_blank"> <b> Click Here </b> </a></p>
                            </div>
                            <p>
                                Joindre une photo pour constituer votre dossier. Les
                                formats acceptés sont les suivants : jpg, gif, png.
                                Taille maximale du fichier :10 Mo.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Curriculum Vitae</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >File Upload</label
                            >
                            <div class="col-md-5 mt-2">
                                <input type="file" name="cv" class="form-control"/>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('assets/profile/'.$user->cv) }}" class="img-fluid" height="200" width="300">
                                <p> <a href="{{ asset('assets/profile/'.$user->cv) }}" target="_blank"> <b> Click Here </b> </a></p>
                            </div>
                            <p>
                                Un CV à jour est nécessaire à l'examen de votre
                                dossier. Les formats acceptés sont les suivants :
                                .doc, .docx (Word), .pdf, .rtf. Taille maximale : 5
                                Mo.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Lieu / ville(s) de formation</h4>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess">Veuillez sélectionner</label>
                            <div class="col-md-7 mt-2">
                                <select name="training_city" class="form-control mb-3">
                                    <option value="Paris" @if($user->training_city == "Paris") selected @endif>Paris</option>
                                    <option value="Martinique" @if($user->training_city == "Martinique") selected @endif>Martinique</option>
                                    <option value="Guadeloupe" @if($user->training_city == "Guadeloupe") selected @endif>Guadeloupe</option>
                                    <option value="Ville" @if($user->training_city == "Ville") selected @endif>Ville</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Distanciel (en visio et classe virtuelle)</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Veuillez sélectionner</label
                            >
                            <div class="col-md-7 mt-2">
                                <select name="remote_class" class="form-control mb-3">
                                    <option value="Paris" @if($user->remote_class == "Paris") selected @endif>Paris</option>
                                    <option value="Martinique" @if($user->remote_class == "Martinique") selected @endif>Martinique</option>
                                    <option value="Guadeloupe" @if($user->remote_class == "Guadeloupe") selected @endif>Guadeloupe</option>
                                    <option value="Ville" @if($user->remote_class == "Ville") selected @endif>Ville</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="text-lg-start">Date de démarrage souhaitée</h4>
                    </div>
                    <div class="col-md-12">
                        <h6 class="text-lg-start">Reportez-vous au calendrier de formation de la ville de
                            votre choix ou indiquez une date approximative.</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row pb-4 has-success">
                            <label
                                class="col-md-3 control-label text-lg-start pt-2"
                                for="inputSuccess"
                            >Date de démarrage souhaitée</label
                            >
                            <div class="col-md-7 mt-2">
                                <input
                                    type="date"
                                    class="form-control"
                                    id="inputSuccess"
                                    name="desired_start_date"
                                    value="{{ $user->desired_start_date }}"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Comment avez-vous connu France Médiation Tous Jours ?</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox-custom checkbox-primary">
                            <input
                                type="radio"
                                id="checkboxExample2"
                                name="how_find_us"
                                value="Le site internet de France Médiation tous jours"
                                @if($user->how_find_us == "Le site internet de France Médiation tous jours")
                                    checked
                                @endif
                            />
                            <label for="checkboxExample1"
                            >Le site internet de France Médiation tous
                                jours</label
                            >
                        </div>
                        <div class="checkbox-custom checkbox-primary">
                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                   value="Les réseaux sociaux"
                                   @if($user->how_find_us == "Les réseaux sociaux")
                                   checked
                               @endif/>
                            <label for="checkboxExample2"
                            >Les réseaux sociaux</label
                            >
                        </div>
                        <div class="checkbox-custom checkbox-primary">
                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                   value="Presse écrite" 
                                   @if($user->how_find_us == "Presse écrite")
                                   checked
                               @endif/>
                            <label for="checkboxExample3">Presse écrite</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary">
                            <input type="radio" id="checkboxExample2"  name="how_find_us"
                                   value="Le bouche à oreilles"
                                   @if($user->how_find_us == "Le bouche à oreilles")
                                   checked
                               @endif/>
                            <label for="checkboxExample4"
                            >Le bouche à oreilles</label
                            >
                        </div>
                        <div class="checkbox-custom checkbox-primary">
                            <input type="radio" id="checkboxExample2" name="how_find_us"
                                   value="Autre" 
                                   @if($user->how_find_us == "Autre")
                                   checked
                               @endif/>
                            <label for="checkboxExample5">Autre </label>
                        </div>
                        <div class="col-md-7 mt-2">
                            <textarea
                              class="form-control"
                              placeholder="Dites-en nous plus"
                              rows="3"
                              id="textareaDefault"
                              name="how_find_us_other"
                          >{{ $user->how_find_us_other }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-lg-start">Vous pouvez préciser votre projet dans cet espace</h4>
                    </div>
                    <div class="col-md-12 mt-2">
                        <textarea
                          class="form-control"
                          placeholder="Dites-en nous plus"
                          rows="3"
                          id="textareaDefault"
                          name="project_detail"
                      >{{ $user->project_detail }}</textarea>
                    </div>
                </div>
                <div class="mt-2 actions clearfix">
                    <button type="submit" class="btn btn-primary"><span class="icon-save2"></span>
                            Update
                    </button>
                </div>
            </div></div>
    </form>
</div>
<!-- END: .main-content -->
@endsection