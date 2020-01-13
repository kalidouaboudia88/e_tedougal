/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Swindow.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

let form = document.getElementById("category_form");
$('form.add-to-cart').submit(function (e) {
   e.preventDefault();
   let form_data = $(this).serialize();
   //alert(form_data);
   $.ajax({
       type: "POST",
       url: '/products/add_to_cart',
       data: form_data,
       success: function (data) {
           if(data.success){
               $(`form#${data.id} button`).html('produit ajouter au panier');
               console.log("Tout va bien");
               Swal.fire({
                   title: 'Produit Ajouté dans le panier!',
                   text: 'Do you want to continue',
                   icon: 'success',
                   html:'<a href="/cart" class="btn btn-success">Ouvrir le panier</a>',
                   showCloseButton: true,
                   showCancelButton: false,
                   focusConfirm: false,
                   confirmButtonText:
                       '<i class="fa fa-thumbs-up"></i> Ajouter d\'autres produits!',
                   confirmButtonAriaLabel: 'Ajouter d\'autres produits!'
               });
           }else{
               console.log("il y une erreur");
           }
       }
   })
});

