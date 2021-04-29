<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ajouter Produit
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Tous les produits</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                            <label class="col-md-4">Nom du produit</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Nom du Produit" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                      </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Slug du produit</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Slug du Produit" class="form-control input-md" wire:model="slug">
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Petite description</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="petite description" class="form-control input-md" wire:model="short_description"></textarea>
                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Description du produit</label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="Description du Produit" class="form-control input-md" wire:model="description"></textarea>
                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Prix du produit</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="prix du Produit" class="form-control input-md" wire:model="regular_price">
                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Prix solde du produit</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="prix solde du Produit" class="form-control input-md" wire:model="sale_price">
                                @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Stock</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                                @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">En solde</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Quantite</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Quantite" class="form-control input-md" wire:model="quantity">
                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Image du produit</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="newImage">
                                @if($newImage)
                                    <img src="{{$newImage->temporaryUrl()}}" with="120">
                                @else
                                    <img src="{{asset('assets/images/products')}}/{{$image}}" with="120">
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Categorie</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                <option value="0">Choisir une categorie</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-4"></label>
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

