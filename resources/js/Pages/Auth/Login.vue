<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

const mostrarSenha = ref(false);

const form = useForm({
    email: '',
    senha: '',
    lembrar: false,
});

function entrar() {
    form.post('/login', {
        onFinish: () => form.reset('senha'),
    });
}
</script>

<template>
    <v-app>
        <Head title="Entrar" />

        <v-main class="login-fundo">
            <v-container class="fill-height" fluid>
                <v-row justify="center" align="center">
                    <v-col cols="12" sm="8" md="5" lg="4" xl="3">
                        <v-card class="pa-6 pa-sm-8" rounded="lg" elevation="12">
                            <div class="text-center mb-6">
                                <v-avatar color="primary" size="72" class="mb-4">
                                    <v-icon icon="mdi-school" size="40" />
                                </v-avatar>
                                <h1 class="text-h5 font-weight-bold text-primary">Portal Escolar</h1>
                                <p class="text-body-2 text-medium-emphasis mt-1">
                                    E.E.M.T.I. Jaime Laurindo da Silva
                                </p>
                            </div>

                            <v-form id="qa-auth-form-login" @submit.prevent="entrar">
                                <v-text-field
                                    id="qa-auth-input-email"
                                    v-model="form.email"
                                    label="E-mail"
                                    type="email"
                                    autocomplete="username"
                                    prepend-inner-icon="mdi-email-outline"
                                    :error-messages="form.errors.email"
                                    autofocus
                                    class="mb-2"
                                />

                                <v-text-field
                                    id="qa-auth-input-senha"
                                    v-model="form.senha"
                                    label="Senha"
                                    :type="mostrarSenha ? 'text' : 'password'"
                                    autocomplete="current-password"
                                    prepend-inner-icon="mdi-lock-outline"
                                    :error-messages="form.errors.senha"
                                >
                                    <template #append-inner>
                                        <v-icon
                                            id="qa-auth-btn-mostrar-senha"
                                            :icon="mostrarSenha ? 'mdi-eye-off' : 'mdi-eye'"
                                            :aria-label="mostrarSenha ? 'Ocultar senha' : 'Mostrar senha'"
                                            role="button"
                                            @click="mostrarSenha = !mostrarSenha"
                                        />
                                    </template>
                                </v-text-field>

                                <v-checkbox
                                    id="qa-auth-checkbox-lembrar"
                                    v-model="form.lembrar"
                                    label="Manter conectado"
                                    density="compact"
                                    hide-details
                                    class="mb-4"
                                />

                                <v-btn
                                    id="qa-auth-btn-login"
                                    type="submit"
                                    size="large"
                                    block
                                    :loading="form.processing"
                                >
                                    Entrar
                                </v-btn>
                            </v-form>
                        </v-card>

                        <p class="text-center text-caption text-white mt-6 login-rodape">
                            &copy; {{ new Date().getFullYear() }} E.E.M.T.I. Jaime Laurindo da Silva
                        </p>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>
.login-fundo {
    background: linear-gradient(135deg, rgb(var(--v-theme-primary)) 0%, #2e7d32 60%, #43a047 100%);
}

.login-rodape {
    opacity: 0.85;
}
</style>
