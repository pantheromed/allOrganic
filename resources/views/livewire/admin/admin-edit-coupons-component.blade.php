<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Modifier Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">Tous les coupons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                            <label class="col-md-4">Code Coupon</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Code Coupon" class="form-control input-md" wire:model="code">
                                @error('code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Type Coupon</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">Fixe</option>
                                    <option value="percent">Pourcentage</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Valeur Coupon</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Valeur Coupon" class="form-control input-md" wire:model="value">
                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">Valeur Panier</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Valeur Panier" class="form-control input-md" wire:model="cart_value">
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
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



