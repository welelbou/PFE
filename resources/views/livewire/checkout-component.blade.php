<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Accueil</a></li>
                <li class="item-link"><span>Acheter</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form action="" wire:submit.prevent="placeOrder">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Adress de facturation</h3>
                        <div class="wrap-address-billing">
                            <p class="row-in-form">
                                <label for="fname">Nom<span>*</span></label>
                                <input  type="text" name="fname" value="" placeholder="Nom" wire:model="firstname">
                                @error('firstname') <span class="text-danger">{{ $message }}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">Prenom<span>*</span></label>
                                <input  type="text" name="lname" value="" placeholder="Prenom" wire:model="lastname">
                                @error('lastname') <span class="text-danger">{{ $message }}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Address email:</label>
                                <input  type="email" name="email" value="" placeholder="Address email" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Tel<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 numero" wire:model="mobile">
                                @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                            </p>
                            
                            
                            <p class="row-in-form">
                                <label for="city">Ville<span>*</span></label>
                                <input  type="text" name="city" value="" placeholder="Ville" wire:model="city">
                                @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                            </p>
                            
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                    <span>Livrer a une adresse différente</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                @if($ship_to_different)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Adresse de livraison</h3>
                            <div class="wrap-address-billing">
                                <p class="row-in-form">
                                    <label for="fname">Nom<span>*</span></label>
                                    <input  type="text" name="fname" value="" placeholder="nom" wire:model="s_firstname">
                                    @error('s_firstname') <span class="text-danger">{{ $message }}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Prenom<span>*</span></label>
                                    <input  type="text" name="lname" value="" placeholder="Prenom"wire:model="s_lastname">
                                    @error('s_lastname') <span class="text-danger">{{ $message }}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Adress email :</label>
                                    <input  type="email" name="email" value="" placeholder="Adress email" wire:model="s_email">
                                    @error('s_email') <span class="text-danger">{{ $message }}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Tel<span>*</span></label>
                                    <input  type="number" name="phone" value="" placeholder="10 numero" wire:model="s_mobile">
                                    @error('s_mobile') <span class="text-danger">{{ $message }}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Ville<span>*</span></label>
                                    <input  type="text" name="city" value="" placeholder="ville" wire:model="s_city">
                                    @error('s_city') <span class="text-danger">{{ $message }}</span>@enderror
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
            
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    {{--<p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>--}}
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                            <span>Paiement a la livraison</span>
                            <span class="payment-desc">Commander maintenant et payer a la livraison</span>
                        </label>
                        {{--<label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="Card" type="radio" wire:model="paymentmode">
                            <span>Debit / Credit Card </span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>--}}
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
                            <span>Bankily</span>
                            {{--<span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a bankily account</span>--}}
                        </label>
                        @error('paymentmode') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    @if(Session::has('checkout'))
                        <p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">{{ Session::get('checkout')['total'] }} MRU</span></p>
                    @endif
                    <button type="submit" class="btn btn-medium">Placer la commande</button>
                </div>
                {{--<div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed 0 MRU</span></p>
                    
                </div>--}}
            </div>
        </form>

            
        </div><!--end main content area-->
    </div><!--end container-->

</main>