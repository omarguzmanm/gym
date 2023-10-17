import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import { Select, initTE } from "tw-elements";
initTE({ Select });


import 'alpinejs';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
