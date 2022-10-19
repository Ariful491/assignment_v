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
    <Head title="Role List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Role
            </h2>
        </template>

        <div class="py-12">
            <div v-if="$page.props.flash.success" class="bg-indigo-200 text-center font-sans w-75 font-semibold  px-5 py-5 rounded-full ">
                {{ $page.props.flash.success }}
            </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                                <div class="text-right">
                                <NavLink :href="route('roles.create')" :active="route().current('roles.create')"  class="ml-3 mr-3 px-5 bg-indigo-800 py-2 text-white hover:text-white hover:bg-green-700 rounded " >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                      Add new Role
                                    </NavLink>
                                </div>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3   border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                                  Id

                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Permission Lists
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in items.data">
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.id}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{item.name}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                   <span v-for="permission in item.permissions" class="bg-green-200 rounded-full px-3 py-2 m-y-2 mx-1">
                                                        {{permission.permission_details.name}}
                                                   </span>
                                                </p>
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


    </AuthenticatedLayout>
</template>
