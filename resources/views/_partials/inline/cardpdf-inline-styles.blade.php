
  /* DISCOUNT CARD
  -------------------------------------------------- */
  @page {
    size: 3.5in 2in;
    margin: 0;
  }
  body {
    background-color: transparent !important;
    margin: 0;
    padding: 0;
  }
  #discountCard {
    width: 504px;
    height: 288px;
    /*margin: 0 auto;*/
  }

  .discount-card .card-header {
    padding: 0.5rem 1.25rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .discount-card .card-header .ldc-card-logo {
    margin-right: .25rem;
    display: inline-block;
    width: 35px;
    float: left;
    margin-top: 3px;
  }

  .discount-card .card-header .ldc-title {
    font-weight: 700;
    text-transform: uppercase;
    font-size: .95rem;
    line-height: 1.1rem;
    padding: 6px 5px 0px;
    display: inline-block;
  }

  .discount-card .card-header .city-name {
    display: inline-block;
    padding-top: 4px;
    font-size: .75rem;
    font-weight: 500;
    letter-spacing: .5px;
    text-transform: uppercase;
  }

  .discount-card .discount-block {
    position: relative;
    display: inline-block;
    width: 20%;
    height: 60px;
    margin: 0;
    padding: 3px 4.85px;
    /*background-color: #f4f4f4;*/
    text-align: center;
  }

  .discount-card .discount-block:nth-last-child(n+6) {
    border-bottom: 1px solid rgba(0,0,0,0.1);
  }

  .discount-card .discount-block:not(:nth-of-type(5n+5)) {
    border-right: 1px solid rgba(0,0,0,0.1);

  }


  .discount-card .discount-block .discount-logo {
    font-size: 8px;
    line-height: 1rem;
    padding: 4px 8px;
    height: 22px;
  }

  .discount-card .discount-block .discount-logo img {
    margin: 0 auto;
    max-height: 18px;
    width: auto;
    max-width: 100%;
    vertical-align: middle;
  }

  .discount-card .discount-block .discount-logo .business-name {
    margin: 0 -3px;
  }

  .discount-card .discount-title {
    font-size: .7rem;
    font-weight: 800;
    text-transform: uppercase;
    line-height: .65rem;
    padding-top: 2px;
  }

  .discount-card .card-footer {
    padding: 0.5rem 1.25rem .75rem;
    border-top: 1px solid rgba(0, 0, 0, 0.125);
  }

  .discount-card .card-footer .site-domain {
    font-size: .75rem;
    font-weight: 600;
    color: #3490dc;
    letter-spacing: 1px;
    margin-bottom: 0;
  }

  .discount-card .card-footer p {
    /*line-height: .6rem;*/
    line-height: .5rem;
  }

  .discount-card .card-footer p small {
    font-size: 8px;
  }
