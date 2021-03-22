<div>
    <div class="container" style="padding: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ajouter Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">Tous les slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSlider">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Titre</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Titre" class="form-control input-md" wire:model="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitre</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitre" class="form-control input-md" wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Prix" class="form-control input-md" wire:model="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Lien</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Lien" class="form-control input-md" wire:model="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage">
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120">
                                    @else
                                        <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Statut</label>
                                <div class="col-md-4">
                                   <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Mettre a jour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

