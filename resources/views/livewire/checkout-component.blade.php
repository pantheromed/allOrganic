<main id="main" class="main-site">
	<div class="container">
		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="/" class="link">home</a></li>
				<li class="item-link"><span>Checkout</span></li>
			</ul>
		</div>
		<div class=" main-content-area">
			<form wire:submit.prevent="placeOrder">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Billing Address</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">Prenom<span>*</span></label>
									<input type="text" name="fname" value="" placeholder="Prenom" wire:model="firstname">
									@error('firstname') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">Nom<span>*</span></label>
									<input type="text" name="lname" value="" placeholder="Nom" wire:model="lastname">
									@error('lasname') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Address:</label>
									<input type="email" name="email" value="" placeholder="Email" wire:model="email">
									@error('email') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Telephone<span>*</span></label>
									<input type="number" name="phone" value="" placeholder="06 66 66 66 66" wire:model="mobile">
									@error('mobile') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Adresse:</label>
									<input type="text" name="add" value="" placeholder="Adresse" wire:model="address">
									@error('address') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Pays<span>*</span></label>
									<input type="text" name="country" value="" placeholder="Maroc" wire:model="country">
									@error('country') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">Code Postal / ZIP:</label>
									<input type="number" name="zip-code" value="" placeholder="Code postal" wire:model="zipcode">
									@error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">Ville<span>*</span></label>
									<input type="text" name="city" value="" placeholder="Ville"wire:model="city">
									@error('city') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form fill-wife">
									<label class="checkbox-field">
										<input type="checkbox" name="different-add" id="different-add" value="1" wire:model="ship_to_different">
										<span>Livrer a une differente adresse</span>
									</label>
								</p>
							</div>
						</div>
					</div>
					@if ($ship_to_different)
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Adresse de livraison</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">Prenom<span>*</span></label>
									<input type="text" name="s_fname" value="" placeholder="Prenom" wire:model="s_firstname">
									@error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">Nom<span>*</span></label>
									<input type="text" name="s_lname" value="" placeholder="Nom" wire:model="s_lastname">
									@error('s_lasname') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Address:</label>
									<input type="email" name="s_email" value="" placeholder="Email" wire:model="s_email">
									@error('s_email') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Telephone<span>*</span></label>
									<input type="number" name="s_phone" value="" placeholder="06 66 66 66 66" wire:model="s_mobile">
									@error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Adresse:</label>
									<input type="text" name="s_add" value="" placeholder="Adresse" wire:model="s_address">
									@error('s_address') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Pays<span>*</span></label>
									<input type="text" name="s_country" value="" placeholder="Maroc" wire:model="s_country">
									@error('s_country') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">Code Postal / ZIP:</label>
									<input type="number" name="s_zip-code" value="" placeholder="Code postal" wire:model="s_zipcode">
									@error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">Ville<span>*</span></label>
									<input type="text" name="s_city" value="" placeholder="Ville"wire:model="s_city">
									@error('s_city') <span class="text-danger">{{$message}}</span> @enderror
								</p>
							</div>
						</div>
					</div>
						
					@endif
				</div>

						@if(Session::has('checkout'))
						<p class="summary-info grand-total"><span>Total</span>
						<span class="grand-total-pricec">{{Session::get('checkout')['total']}} dhs</span>
						</p>
						@endif
					
				<div class="summary-info grand-total">
					<button type="submit" class="btn btn-medium">Valider Ordre</button>
				</div>
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<div class="choose-payment-methods">
							<label class="payment-method">					
								<span>Payer En Livraison</span>
								<span class="payment-desc">Commandez maintenant et payer pendant la livraison</span>
							</label>							
						</div> 
					</div> 
				</div>
			</form>
		</div>
	</div>
</main>
