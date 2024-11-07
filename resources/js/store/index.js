import {createStore} from 'vuex';
import {prices} from './prices';
import {meters} from './meters';

export default createStore({
    modules: {
        prices: prices,
        meters: meters
    }
});
