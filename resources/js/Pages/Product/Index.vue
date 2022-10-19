<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Pagination.vue'
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    items: Object,
    pageName: String,

})
</script>
<script>
export default {
    data() {
        return {
            status: route().params.status,
            pageNumber: route().params.page,
            price:route().params.price,

        }
    },

    methods: {
        shorting() {
            if (this.sorting === 'desc') {
                this.sorting = 'asc'
            } else {
                this.sorting = 'desc'
            }
            this.$inertia.visit('products',
                {
                    method: 'get',
                    data: {
                        status: this.status,
                        sort:   this.sorting,
                        page:   this.pageNumber,
                        price:  this.price,

                    },
                });
        },

        removeData($id){
            this.$inertia.delete(route("products.destroy", $id));

        }
    },

    mounted(){

    }
}
</script>

<template>
    <Head title="Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product
            </h2>
        </template>

        <div class="py-12">
            <div v-if="$page.props.flash.success" class="bg-indigo-200 text-center font-sans w-75 font-semibold  px-5 py-5 rounded-full ">
                {{ $page.props.flash.success }}
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <p> Price </p>
                <input type="range" @change="shorting()"   v-model="price" class="w-full" min="0" max="600"     />
                <div class="w-full flex justify-between text-xs px-2">
                    <span>0</span>
                    <span>100</span>
                    <span>200</span>
                    <span>300</span>
                    <span>400</span>
                    <span>500</span>
                    <span>600</span>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div class="my-2 flex sm:flex-row flex-col">
                                    <div class="relative">
                                        <select @change="shorting()" v-model="status"
                                            class="appearance-none h-full   sm:rounded-r-none sm:border-r-0    block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                            <option  selected value="">All</option>
                                            <option  value="1">Active</option>
                                            <option  value="2">Inactive</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                <NavLink  v-if="$page.props.auth.permissions.includes('products.create')" :href="route('products.create')" :active="route().current('products.create')"  class="ml-3 mr-3 px-5 bg-indigo-800 py-2 text-white hover:text-white hover:bg-green-700 rounded " >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                      Add Product
                                    </NavLink>
                                </div>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <sub class="small   bg-blue-200 px-2 py-1   rounded-full  left-0" > Double click for Desc/one click for Asc</sub>

                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3   border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                              <primary-button  @click="shorting()">
                                                  ID   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                                  </svg>

                                              </primary-button>


                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Photo
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr v-for="item in items.data">
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.id}}
                                                </p>
                                            </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.name}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.type}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.price}}
                                                </p>
                                            </td>

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-48 ">
                                                        <img class="w-full h-full rounded-full"
                                                             :src="item.photo"
                                                             :alt="item.name" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative"> {{item.status==1?'Active':'Inactive'}}</span>
                                    </span>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <NavLink  v-if="$page.props.auth.permissions.includes('products.edit')" :href="route('products.edit',item.id)" :active="route().current('products.edit')"  class="ml-3 bg-green-700 mr-3 px-5 py-3 rounded-lg mx-auto   justify-items-center hover:text-black hover:bg-white hover:border-gray-300 text-white">
                                                     Edit
                                                </NavLink>
                                                <PrimaryButton  v-if="$page.props.auth.permissions.includes('products.destroy')" class="ml-3 bg-red-700 mr-3" @click="removeData(item.id)">
                                                     Delete
                                                </PrimaryButton>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                   <Pagination :links="items.links"></Pagination>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </AuthenticatedLayout>
</template>
