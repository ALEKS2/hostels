<html>
<head>
  <title>Dynatable Demo</title>
  <script src="jquery.js" type="text/javascript"></script> 
  <script src="jquery.dynatable.js" type="text/javascript"></script>

  <style>
    /* Example Styles for Demo */
    table {
      border: solid 1px #ccc;    border-collapse: collapse;
      border-spacing: 0;
      position: relative; /* Add positioning */
    }
    td, th {
      border-bottom: solid 1px #eee;
      border-top: solid 1px #ccc;
      border-left: solid 1px #eee;
      border-right: solid 1px #ccc;
      padding: 10px 15px;
    }
    th {
      background: #eee;
    }
    #example-ul, #ajax-ul {
      display: block;
      margin-top: 30px;
      border: solid 1px #ccc;
    }

  </style>

  <script type="text/javascript">
    $(document).ready( function() {
        $('#example-table').dynatable();

        $('#example-ul').dynatable({
          table: {
            rowFilter: function(rowIndex, record) {
              return $(
                '<li class="row">This is my name: <span class="the-name">' + record.name + '</span> and this is my ID: <span class="the-id">' + record.id + '</span></div>'
              );
            },
            bodyRowSelector: 'li.row'
          },
          dataset: {
            records: [
              {id: 1, name: "Alfa Jango"},
              {id: 2, name: "Bellota"}
            ]
          }
        });

        $('#ajax-ul').dynatable({
          table: {
            rowFilter: function(rowIndex, record) {
              return $(
                '<li class="row">This is my name: <span class="the-name">' + record.name + '</span> and this is my ID: <span class="the-id">' + record.id + '</span></div>'
              );
            },
            bodyRowSelector: 'li.row'
          },
          dataset: {
            ajax: true,
            ajaxUrl: 'ajax_data.json',
            records: []
          }
        });
    });
  </script>
</head>
<body>
  <table id='example-table'>
    <thead>
      <tr>
        <th>id</th><th>name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td><td>Caitlin</td>
      </tr>
      <tr>
        <td>2</td><td>Steve</td>
      </tr>
      <tr>
        <td>3</td><td>Cory</td>
      </tr>
    </tbody>
  </table>

  <hr />

  <ul id="example-ul"></ul>

  <hr />

  <ul id="ajax-ul"></ul>
</body>