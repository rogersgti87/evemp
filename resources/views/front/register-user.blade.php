<form class="form-register-user">

    <div class="col-md-12">
    <div class="form-row">

                <div class="col-md-12">

                <fieldset>
                    <legend>Informações do Membro</legend>

                <div class="form-row">

                    <input type="hidden" name="type" value="Membro">
                    <input type="hidden" name="status" value="0">

                <div class="form-group col-md-12 col-sm-12">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name" id="name" autocomplete="off" required value="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" required value="">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" required value="">
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label>Confirme a senha</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="off" required value="">
                </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" autocomplete="off" required value="">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" autocomplete="off" required value="">
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label>Ministério</label>
                        <select class="form-control custom-select" name="ministry_id" id="ministry_id">
                            @foreach($ministries as $ministry)
                                <option {{ isset($data->ministry_id) === $ministry->id ? 'selected' : '' }} value="{{ $ministry->id }}">{{ $ministry->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Profissão</label>
                        <input type="text" class="form-control" name="profession" id="profession" autocomplete="off" required value="">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Desempregado?</label>
                        <select class="form-control custom-select" name="work_state" id="work_state">
                            <option value="Não">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>

                    </div>

                </fieldset>


            </div>



    </div>

    </div>

</form>


