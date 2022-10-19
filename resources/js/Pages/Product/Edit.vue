<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Radio from '@/Components/Radio.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

 const item = defineProps({
    item:Object,
});

const form = useForm({
    name:item.item.name ,
    type: item.item.type,
    price: item.item.price,
    size: item.item.size,
    litter: item.item.litter,
    color: item.item.color,
    details:  item.item.details,
    photo:'',
    status: item.item.status,
    id:item.item.id,

});

const submit = () => {
        form.put(route('products.update', form.id), {
            onFinish: () => form.reset(),
        });



};




</script>
<script>
  export default {
      data(){
          return{
              typechecker:true,


          }
      },

      methods:{
          formTypeCheck(){
             if(this.form.type=='1'){
                 this.typechecker=true
             }
             else{
                 this.typechecker=false
             }
          },
          ImagePrev(e){
              let file=e.target.files[0];
              var reader = new FileReader();
              reader.onload = (e) =>{
                  this.form.photo = e.target.result;

              }
              reader.readAsDataURL(file);

          },
          thumnailReturn(url){
              return 'http://127.0.0.1:8000/'+url;
          },

      },
      mounted() {
          this.formTypeCheck();

      }

  }
</script>


<template>
    <AuthenticatedLayout>
        <Head title="Update Product" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Update   Product
            </h2>
        </template>
        <div class="bg-indigo-800 text-white" v-if="!$page.props.auth.permissions.includes('products.store')">
           Sorry! You you can not store data , don't have   permission.
        </div>
        <div v-else class="py-12" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="type" value="Product Type" />
                 <input type="radio" name="type" class="mr-3 w-6 h-6 rounded-lg"
                        checked="true"
                        @change="formTypeCheck()" v-model="form.type"  value="1"   for="solid" />
                  <span class="mr-3"> Solid   </span>
                 <input type="radio" name="type"  class="mr-3 w-6 h-6 rounded-lg"  v-model="form.type"  @change="formTypeCheck()" value="2"   for="liquid" />
                Liquid
                 <InputError class="mt-2" :message="form.errors.type" />
            </div>

            <div class="mt-4">
                <InputLabel for="price" value="Price" />
                <TextInput id="price" type="number" class="mt-1 block w-full" v-model="form.price" required autocomplete="price" />
                <InputError class="mt-2" :message="form.errors.price" />
            </div>

            <div class="mt-4" v-if="typechecker" >
                <InputLabel for="size" class="bg-indigo-50 px-4" value="Weight (for Solid)" />
                <TextInput id="size" type="text" class="mt-1 block w-full" v-model="form.size" required autofocus autocomplete="size" />
                <InputError class="mt-2" :message="form.errors.size" />
            </div>

            <div class="mt-4" v-else>
                <InputLabel for="litter" value="Litter (for Liquid)" />
                <TextInput id="litter" type="text" class="mt-1 block w-full" v-model="form.litter" required autocomplete="litter" />
                <InputError class="mt-2" :message="form.errors.litter" />
            </div>


            <div class="mt-4">
                <InputLabel for="color" value="Color" />
                <TextInput id="color" type="color" class="mt-1 block w-full" v-model="form.color" required autofocus autocomplete="color" />
                <InputError class="mt-2" :message="form.errors.color" />
            </div>



            <div class="mt-4">
                <InputLabel for="details" value="details" />
                <textarea id="details" type="text" class="mt-1 block w-full" rows="10" v-model="form.details" required autocomplete="details" ></textarea>
                <InputError class="mt-2" :message="form.errors.details" />
            </div>
            <div class="mt-4">
                <InputLabel for="type" value="  Status" />
                <input type="radio"   name="status" class="mr-3 w-6 h-6 rounded-lg"  v-model="form.status"   value="1" for="active" />
                <span class="mr-3"> Active </span>
                <input type="radio"   name="status"  class="mr-3 w-6 h-6 rounded-lg"  v-model="form.status"    value="2" for="inactive" />
                Inactive
                <InputError class="mt-2" :message="form.errors.status" />
            </div>


            <div class="mt-4">
                <InputLabel for="photo"  value="Photo"/>
                <TextInput id="photo" @change="ImagePrev($event)" type="file" class="mt-1 block w-full"    />
                <InputError class="mt-2" :message="form.errors.photo" />
                <img  v-if="!form.photo"  :src="thumnailReturn(item.item.photo)" class="w-48" >
                <img  v-else  :src="form.photo" class="w-48" >

            </div>


            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                 Update   Product
                </PrimaryButton>
            </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
