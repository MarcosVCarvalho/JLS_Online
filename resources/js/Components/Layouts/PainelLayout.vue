<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const pagina = usePage();

const usuario = computed(() => pagina.props.auth.usuario);
</script>

<template>
    <v-app>
        <v-app-bar color="primary" elevation="2">
            <template #prepend>
                <v-icon icon="mdi-school" class="ms-2" />
            </template>

            <v-app-bar-title>Portal JSL</v-app-bar-title>

            <template #append>
                <div class="d-none d-sm-flex flex-column align-end me-4">
                    <span class="text-body-2 font-weight-medium">{{ usuario.nome }}</span>
                    <span class="text-caption">{{ usuario.roleRotulo }}</span>
                </div>

                <Link
                    :id="`qa-${usuario.role}-nav-logout`"
                    href="/logout"
                    method="post"
                    as="button"
                >
                    <v-btn variant="outlined" color="white" prepend-icon="mdi-logout" tag="span">
                        Sair
                    </v-btn>
                </Link>
            </template>
        </v-app-bar>

        <v-main>
            <v-container class="py-8">
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>
