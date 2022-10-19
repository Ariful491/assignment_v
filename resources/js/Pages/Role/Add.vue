<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Radio from '@/Components/Radio.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    items: Object,
    pageName: String,

})
const form = useForm({
    name: '',
    permissions:[],

});



const submit = () => {
        form.post(route('roles.store'), {
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
             if(this.form.type==='1'){
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

          }

      }
  }
</script>


<template>
    <AuthenticatedLayout>
        <Head title="Add Role" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Add  Role {{permissions}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Role Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="type" value="Permission List" />
                <div  v-for="item in items">
                <input type="checkbox"   class="mr-3 mt-2 mb-1 mr-2 w-6 h-6 rounded-lg"  v-model="form.permissions"   :value="item.id" :for="item.name+item.id" />
                  <label class="mr-3" :for="item.name+item.id" > {{ item.name }} </label>
                </div>
                <InputError class="mt-2" :message="form.errors.status" />
            </div>



            <div class="flex items-center justify-end mt-4" v-if="$page.props.auth.permissions.includes('products.store')">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Add  Role
                </PrimaryButton>
            </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
