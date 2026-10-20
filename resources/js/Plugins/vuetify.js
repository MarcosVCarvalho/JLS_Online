import '@mdi/font/css/materialdesignicons.css';
import 'vuetify/styles';

import { createVuetify } from 'vuetify';
import colors from 'vuetify/util/colors';
import { pt } from 'vuetify/locale';

export default createVuetify({
    locale: {
        locale: 'pt',
        messages: { pt },
    },
    theme: {
        defaultTheme: 'jsl',
        themes: {
            jsl: {
                dark: false,
                colors: {
                    primary: colors.green.darken4,
                    secondary: colors.green.darken2,
                    background: '#F4F7F4',
                    surface: '#FFFFFF',
                },
            },
        },
    },
    defaults: {
        VTextField: {
            variant: 'outlined',
            color: 'primary',
            density: 'comfortable',
        },
        VBtn: {
            color: 'primary',
        },
        VCheckbox: {
            color: 'primary',
        },
    },
});
