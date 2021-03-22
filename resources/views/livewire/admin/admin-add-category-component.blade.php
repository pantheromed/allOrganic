<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ajouter Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">Tous les categories</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addCategory">
                        <div class="form-group">
                            <label class="col-md-4">Nom de la categorie</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Nom de la categorie" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" >
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Slug de la categorie</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Slug de la categorie" class="form-control input-md" wire:model="slug">
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

