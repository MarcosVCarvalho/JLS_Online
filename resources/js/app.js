import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import vuetify from './Plugins/vuetify';

createInertiaApp({
    title: (titulo) => (titulo ? `${titulo} - Portal JSL` : 'Portal JSL'),
    resolve: (nome) => {
        const paginas = import.meta.glob('./Pages/**/*.vue', { eager: true });

        return paginas[`./Pages/${nome}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el);
    },
    progress: {
        color: '#A5D6A7',
    },
});
