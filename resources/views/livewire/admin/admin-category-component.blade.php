<div>
<div>
<style>
    nav svg{
        height: 20px;;
    }
    nav .hidden{
        display: block !important;
    }
</style>
<div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Tous les categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Ajouter categorie</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                        <table class="table table-stripes">
                            <thead>
                                <tr>
                                    <th>Id</th>                                   
                                    <th>Nom</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route('admin.editcategory', ['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" style="margin-left: 10px;" onclick="confirm('Etes-vous sure de supprimer?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
