import "./bootstrap";
import jQuery from "jquery";
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import "./subkriteria/app";
import "./skalaIndikator/app";
import "./textArea/textAreaHeight";

window.$ = jQuery;

Alpine.plugin(focus);
window.Alpine = Alpine;
Alpine.start();
