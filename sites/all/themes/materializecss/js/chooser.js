(function ($) {
  "use strict"
  $(document).ready(function() {
    $('.card-content').append('<div class="row"><form id="form" class="chooser research-data col s12"></form><h5>Options:</h5><div id="options"></div></div><ul class="collection messages"></ul>');
    var form = [
      {type: 'checkbox', label: 'Are you working with databases or do you need a custom database?', name: 'db'},
      {type: 'slider', label: 'How many files do you expect to store?', name: 'fileCount', min: 0, max: 1000000},
      {type: 'slider', label: 'How much data do you expect to store in total (in GB)?', name: 'dataTotal', min: 0, max: 10000},
      {type: 'slider', label: 'What are the typical file sizes (in KB)?', name: 'typicalFileSize', min: 0, max: 100000000},
      {type: 'checkbox', label: 'Do you need to keep a version history for your data (will it change through time, and will you need to see previous versions)?', name: 'vc'},
      {type: 'checkbox', label: 'Do you have collaborators that need access?', name: 'collab'},
      {type: 'checkbox', label: 'From the University of Auckland?', name: 'collabUOA'},
      {type: 'checkbox', label: 'From other parts of New Zealand?', name: 'collabNZ'},
      {type: 'checkbox', label: 'From overseas?', name: 'collabOS'},
      {type: 'checkbox', label: 'Do you need to work on documents collaboratively in real-time?', name: 'collabRealTime'},
      {type: 'checkbox', label: 'Do you need to sync files between computers?', name: 'sync'},
      {type: 'checkbox', label: 'Is your data ready for archive/publish?', name: 'archive'},
      {type: 'checkbox', label: 'Do you plan to utilise HPC?', name: 'hpc'},
      {type: 'checkbox', label: 'Are you working with sensitive data?', name: 'sensitive'},
      //{type: 'checkbox', label: 'Is it ethics related?', name: 'ethics'},
      //{type: 'checkbox', label: 'Is it IP/commercial?', name: 'comm'},
      {type: 'checkbox', label: 'Is it important that your data remains in NZ?', name: 'nzdata'},
      
    ];
    for (var i in form) {
      var e = form[i];
      if (e.type == 'checkbox') { 
        $("#form").append('<div class="input-field col s12"><input id="' + e.name + '" class="checkbox" type="checkbox"/><label for="' + e.name + '">' + e.label + '</label></div>');
      } else if (e.type == 'slider') {
        //$("#form").append('<div class="input-field col s12"><label for="' + e.name + '">' + e.label + '</label><input id="' + e.name + '" class="form-control slider" data-slider-id="' + e.name + 'Slider" type="text" data-slider-min="' + e.min + '" data-slider-max="' + e.max + '" data-slider-step="100" data-slider-value="0"/></div>');
      }
    }
    
    var options = [
      {name: "aws", link: "https://aws.amazon.com/"},
      {name: "db", link: "https://www.mysql.com/"},
      {name: "dropbox", link: "https://www.dropbox.com/"},
      {name: "figshare", link: "https://auckland.figshare.com/"},
      {name: "gdrive", link: "https://www.library.auckland.ac.nz/services/it-essentials/file-saving-and-sharing"},
      {name: "gpfs", link: "https://wiki.auckland.ac.nz/display/CER/Access+and+data+transfer#Accessanddatatransfer-Datatransfer"},
      {name: "hdd", link: "http://www.pbtech.co.nz/index.php?z=c&p=externalhdd"},
      {name: "network share", link: "https://www.library.auckland.ac.nz/services/it-essentials/file-saving-and-sharing"},
      {name: "seafile", link: "https://seafile.cer.auckland.ac.nz"}
    ];
    for (var i in options) {
      var o = options[i];
      $("#options").append('<a href="' + o.link + '"><div id="option_' + o.name + '" class="option"><img src="https://uoa-eresearch.github.io/dataservices/images/' + o.name + '.png"/></div></a>');
    }
    $('#option_gpfs').append('<span class="label-container"><span class="gpfs label label-info chip">GPFS cluster storage on Pan</span></span>');
    $('#option_hdd').append('<span class="label-container"><span class="hdd label label-info chip">An external harddrive</span></span>');
    
    $(".slider").slider({
      tooltip: 'always'
    });
    $('#collab').closest('.input-field').nextAll(':lt(4)').hide();
    $('#collab').change(function() {
      $('#collab').closest('.input-field').nextAll(':lt(4)').slideToggle();
    });
    $('#collabRealTime').change(function() {
      if (this.checked) {
        $('html, body').animate({
          scrollTop: $("#options").offset().top
        }, 2000);
        $('div.option').not('#option_gdrive').hide();
        $(".messages").append('<li id="gdrive_help" class="collection-item dismissable">Google Drive is the recommended system for real time collaboration on documents</li>');
      } else {
        $('div.option').not('#option_gdrive').show();
        $('#gdrive_help').remove();
      }
    });
    $('#db').change(function() {
      if (this.checked) {
        $('html, body').animate({
          scrollTop: $("#options").offset().top
        }, 2000);
        $('div.option').not('#option_db').hide();
        $(".messages").append('<li id="db_help" class="collection-item dismissable">If you require a database, the Centre for eResearch can provide you with a VM to host one. Find more information <a href="http://www.eresearch.auckland.ac.nz/en/centre-for-eresearch/research-facilities/virtual-machine-farm.html" class="alert-link">here</a></li>');
      } else {
        $('div.option').not('#option_db').show();
        $('#db_help').remove();
      }
    });
    $('#vc').change(function() {
      if (this.checked) {
        $(".messages").append("<li id='vc_help' class='collection-item dismissable'>Dropbox and Google Drive will automatically keep revisions of a file up until the last 30 days. If you're not using these services, an SCM tool such as <a href='https://www.mercurial-scm.org/' class='alert-link'>Mercurial</a> or <a href='https://git-scm.com/' class='alert-link'>Git</a> will be able to track revisions of your files</li>");
      } else {
        $('#vc_help').remove();
      }
    });
    $('#archive').change(function() {
      if (this.checked) {
        $('div.option').not('#option_figshare').hide();
        $(".messages").append("<li id='archive_help' class='collection-item dismissable'>Figshare is the recommended system for publishing data.</li>");
      } else {
        $('div.option').not('#option_figshare').show();
        $('#archive_help').remove();
      }
    });
    $('#nzdata').change(function() {
      if (this.checked) {
        $('#option_aws').hide();
        $('#option_dropbox').hide();
        $('#option_gdrive').hide();
      } else {
        $('#option_aws').show();
        $('#option_dropbox').show();
        $('#option_gdrive').show();
      }
    });
    console.log(clippy);
    window.$ = jQuery;
    clippy.load('Clippy', function(agent) {
        // Do anything with the loaded agent
        agent.show();
        agent.moveTo(1000,500);
        setTimeout(function() {
          agent.speak("It looks like you're trying to choose a research data service");
          setInterval(function() {
            agent.animate();
          }, 5000);
        }, 1000);
    });
  });
})(jQuery);