$(document).ready(function () {
   switch ($('#pageno').val()) {
       case 'admin-dash':
           $( "#p1" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p11" ).addClass( "active" );
           break;
       case 'kitchen-live':
           $( "#p3" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p31" ).addClass( "active" );

           break;
       case 'add-order':
           $( "#p4" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p41" ).addClass( "active" );

           break;
       case 'all-order':
           $( "#p4" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p42" ).addClass( "active" );
           break;
       case 'unpaid-order':

           $( "#p4" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p43" ).addClass( "active" );
           break;
       case 'details-order':
           $( "#p4" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           break;
       case 'supply':
           $( "#p5" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p51" ).addClass( "active" );
           break;
       case 'income':
           $( "#p6" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p61" ).addClass( "active" );
           break;
       case 'expense':
           $( "#p6" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p62" ).addClass( "active" );
           break;
       case 'all-table':
           $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p116" ).addClass( "active" );
           break;
       case 'all-item':
           $( "#p8" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p81" ).addClass( "active" );
           break;
       case 'all-stock':
           $( "#p8" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p83" ).addClass( "active" );
           break;
       case 'item':
           $( "#p8" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p82" ).addClass( "active" );
           break;
       case 'recipe':
           $( "#p9" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p92" ).addClass( "active" );
           break;
       case 'add-recipe':
           $( "#p9" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           break;
       case 'all-dish':
           $( "#p9" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p91" ).addClass( "active" );
           break;
       case 'product':
           $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p111" ).addClass( "active" );
           break;
       case 'employee':
           $( "#p10" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p101" ).addClass( "active" );
           break;

       case 'application':
       $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p112" ).addClass( "active" );
           break;
       case 'unit':
           $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p113" ).addClass( "active" );
           break;
       case 'discount':
           $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p114" ).addClass( "active" );
           break;
       case 'vat':
           $( "#p1111" ).removeClass( "menu-close" ).addClass( "menu-open active" );
           $( "#p115" ).addClass( "active" );
           break;

       default:
          console.log(':(');
   }
});
