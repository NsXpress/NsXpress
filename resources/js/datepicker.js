import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import localeDa from 'air-datepicker/locale/da';

new AirDatepicker('#datepicker', {
    autoClose: true,
    dateFormat: 'dd-MM-yyyy',
    locale: localeDa
});