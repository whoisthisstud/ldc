<link rel="stylesheet" type="text/css" href="{{ asset('/vendors/DataTables/datatables.min.css') }}"/>
<style>
#messagesTable {
    border-radius: 5px;
}
#messagesTable_length,
#messagesTable_info,
#messagesTable_paginate {
    display: inline-block;
}
#messagesTable_filter,
#messagesTable_paginate {
    float: right;
}
#messagesTable_length label,
#messagesTable_filter label {
    opacity: 1;
    font-size: 80%;
    font-weight: 500;
}
#messagesTable_filter input {
    margin-left: 0.5rem;
    display: inline-block;
    width: 300px;
    border-radius: 20px;
    background-color: #e3e7ee;
    padding: 0 .5rem 0 2.125rem;
}
#messagesTable_filter .form-control{
    background-image: url({{ asset('/i/search.svg') }});
    background-repeat: no-repeat;
    background-position: 9px 4px !important;
    background-size: 17px 25px;
}
#messagesTable_filter input:focus {
    background-color: #ffffff;
}
#messagesTable_length select {
    margin: 0 .25rem;
}
#messagesTable {
    margin-bottom: 1.5rem !important;
}
table.dataTable tbody td.no-padding {
    padding: 0;
}
.table .thead-dark th {
    color: #ffffff;
    background-color: #708fa9;
    border-color: #708fa9;
}
.table .thead-dark th:first-of-type {
    border-top-left-radius: 5px;
}
.table .thead-dark th:last-of-type {
    border-top-right-radius: 5px;
}

td.details-control::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    content: '\f063';
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    transform: rotate(0deg);
    transition: transform .15s linear;
}
td.details-control {
    cursor: pointer;
    text-align: right;
}
tr.shown td.details-control::before {
    /*content: '\f062';*/
    transform: rotate(-180deg);
    transition: transform .35s linear;
}
.slider {
    display:none;
}
.sub-row {
    padding: .5rem 2.5rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
}
.sub-row .main {

}
.sub-row .secondary {
    font-size: .75rem;
    font-weight: 400;
}
button.reply-btn {
    margin: 0 3.5rem 1.5rem;
}
tr.inactive {
    background-color: #c9cbcf;
    color: #a0a5ab;
}
</style>