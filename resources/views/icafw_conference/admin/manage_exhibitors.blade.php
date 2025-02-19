<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Map, Booths, and Labels</title>

    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Interact.js for drag and drop -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        #mapCanvas {
            border: 1px solid #ccc;
            width: 950px;
            height: 600px;
            position: relative;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            margin-bottom: 20px;
            background-image: url('{{ asset('exhibition/maps/' . $map_image) }}');
        }

        .booth,
        .label {
            position: absolute;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: white;
            user-select: none;
        }

        .booth {
            background-color: green;
        }

        .status-available {
            background-color: green;
        }

        .status-reserved {
            background-color: orange;
        }

        .status-occupied {
            background-color: red;
        }

        .label {
            background-color: blue;
            font-size: 14px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin - Manage Map, Booths, and Labels</h1>

        <div class="form-group">
            <label for="map">Select Map:</label>
            <select name="map" id="map" class="form-control">
                <option value="">-- Choose Map to Manage --</option>
                @foreach ($maps as $map)
                    <option value="{{ $map->id }}">{{ $map->map_name }}</option>
                @endforeach
            </select>

            <!-- Trigger Modal -->
            <button type="button" id="new_map" class="btn btn-secondary mt-2" data-toggle="modal"
                data-target="#newMapModal">NEW Map</button>
        </div>

        <!-- Modal Structure -->
        <div class="modal fade" id="newMapModal" tabindex="-1" aria-labelledby="newMapModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMapModalLabel">Add New Map</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="newMapForm" action="{{ route('store.new_map') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf <!-- This is important to include -->
                            <div class="form-group">
                                <label for="newMapName">New Map Name:</label>
                                <input type="text" name="map_name" id="newMapName" class="form-control"
                                    placeholder="Enter New Map Name">
                            </div>
                            <div class="form-group">
                                <label for="mapUpload">Upload Map of Building/Floor Plan:</label>
                                <input type="file" id="mapUpload" name="map_image" class="form-control-file"
                                    accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Save New Map</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Canvas where the map will be loaded -->
        <div id="mapCanvas"></div>

        <div class="row">
            <!-- Add Booth -->
            <div class="col-md-6">
                <h3>Add Booth</h3>
                <form id="newBoothForm" action="{{ route('store.booth') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="booth_map_id">Map ID:</label>
                        <input id='booth_map_id' type="number" name='map_id' hidden required>
                        <label for="boothName">Booth Name</label>
                        <input type="text" id="boothName" class="form-control" placeholder="Enter Booth Name">
                    </div>
                    <div class="form-group">
                        <label for="boothStatus">Booth Status</label>
                        <select id="boothStatus" class="form-control" required>
                            <option value="available">Available</option>
                            <option value="reserved">Reserved</option>
                            <option value="occupied">Occupied</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="boothPrice">Booth Price</label>
                        <input type="number" id="boothPrice" class="form-control" placeholder="Enter Booth Price"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="b_position_x">Position X</label>
                        <input id='b_position_x' type="number">
                        <label for="b_position_y">Position Y</label>
                        <input id='b_position_y' type="number">
                    </div>

                    <div class="form-group">
                        <label for="boothDescription">Booth Description</label>
                        <textarea id="boothDescription" class="form-control" rows="3" placeholder="Enter Booth Description"></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="boothImage">Booth Icon (Optional)</label>
                        <input type="file" id="boothImage" class="form-control-file" accept="image/*">
                    </div> --}}
                    <button type="submit" id="addBoothBtn" class="btn btn-primary">Add Booth</button>
                </form>
            </div>

            <!-- Add Label -->
            <div class="col-md-6">
                <h3>Add Label</h3>
                <form id="labelForm" action="{{ route('store.label') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="label_map_id">Map ID:</label>
                        <input id='label_map_id' type="number" name='map_id'>
                        <label for="labelName">Label Name</label>
                        <input type="text" id="labelName" class="form-control" placeholder="Enter Label Name">
                    </div>

                    <div class="form-group">
                        <label for="l_position_x">Position X</label>
                        <input id='l_position_x' type="number">
                        <label for="l_position_y">Position Y</label>
                        <input id='l_position_y' type="number">
                    </div>

                    <div class="form-group">
                        <label for="labelColor">Label Color</label>
                        <input type="color" id="labelColor" class="form-control" value="#0000ff"
                            title="Pick Label Color">
                    </div>
                    <div class="form-group">
                        <label for="labelDescription">Label Description (Optional)</label>
                        <input type="text" id="labelDescription" class="form-control"
                            placeholder="Enter Label Description">
                    </div>
                    <button type="submit" id="addLabelBtn" class="btn btn-info">Add Label</button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <button id="save-layout-button">Save Layout</button>
        </div>
    </div>

    <script>
        const mapCanvas = document.getElementById('mapCanvas');
        let booths = [];
        let labels = [];

        currentMapId = 1;

        const booth_map_id = document.getElementById('booth_map_id');
        const label_map_id = document.getElementById('label_map_id');
        const selected_map = document.getElementById('map');

        const b_position_x = document.getElementById('b_position_x');
        const b_position_y = document.getElementById('b_position_y');
        const l_position_x = document.getElementById('l_position_x');
        const l_position_y = document.getElementById('l_position_y');

        const map_id_store = (id) => {
            booth_map_id.value = id;
            label_map_id.value = id;
        }

        $(document).on('change', '#map', function() {
            const mapId = $(this).val();
            loadMap(mapId); // AJAX to fetch booths/labels for this map
            map_id_store(mapId);

            load_map_contents(mapId);
        });

        function loadMap(mapId) {
            // Call an endpoint to load the booths/labels for the selected map
            // $.get('/load/map/'+mapId, function(response){});
            console.log("Map ID selected: " + mapId);
        }


        function load_map_contents(mapId) {
            $('#mapCanvas').empty(); // Clear existing content on the canvas

            $.ajax({
                url: `/get-map-data/${mapId}`,
                type: 'GET',
                success: function(response) {
                    const loadedBooths = response.booths;
                    const loadedLabels = response.labels;

                    // Display booths on the map
                    loadedBooths.forEach(function(boothData) {
                        // Create booth element similar to initial creation
                        const boothElement = document.createElement('div');
                        boothElement.classList.add('booth', `status-${boothData.status}`);
                        boothElement.innerText = boothData.booth_name;

                        // Set position and transform styles
                        boothElement.style.position = 'absolute';
                        boothElement.style.left = boothData.position_x + 'px';
                        boothElement.style.top = boothData.position_y + 'px';
                        boothElement.style.transform =
                            `translate(${boothData.transform_x}px, ${boothData.transform_y}px)`;

                        // Add custom data attributes
                        boothElement.setAttribute('data-price', boothData.price);
                        boothElement.setAttribute('data-description', boothData.description);

                        // Check and add booth icon if exists
                        if (boothData.booth_icon) {
                            const boothIconPath =
                                `/assets/images/exhibition/icon/${boothData.booth_icon}`;
                            const img = document.createElement('img');
                            img.src = boothIconPath;
                            img.alt = 'Booth Icon';
                            boothElement.appendChild(img);
                        }

                        // Attach click event to display booth details
                        boothElement.addEventListener('click', function() {
                            displayBoothDetails(boothData);
                        });

                        // Make the booth draggable
                        boothElement.draggable = true;

                        // Add booth to the canvas and the booths array
                        booths.push(boothElement);

                        console.log(booths);

                        mapCanvas.appendChild(boothElement);
                    });

                    // Display labels on the map
                    loadedLabels.forEach(function(labelData) {
                        // Create label element similar to initial creation
                        const labelElement = document.createElement('div');
                        labelElement.classList.add('content-item', 'label');
                        labelElement.innerText = labelData.label_name;

                        // Set position, transform, and color styles
                        labelElement.style.position = 'absolute';
                        labelElement.style.left = labelData.position_x + 'px';
                        labelElement.style.top = labelData.position_y + 'px';
                        labelElement.style.transform =
                            `translate(${labelData.transform_x}px, ${labelData.transform_y}px)`;
                        labelElement.style.backgroundColor = labelData.color;

                        // Add label to the canvas and the labels array
                        labels.push(labelElement);
                        mapCanvas.appendChild(labelElement);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }







        $('#addBoothBtn').click(function(e) {
            e.preventDefault();

            const boothName = $('#boothName').val();
            const boothStatus = $('#boothStatus').val();
            const boothPrice = $('#boothPrice').val();
            const boothDescription = $('#boothDescription').val();
            // const boothIcon = $('#boothImage').prop('files')[0]; // if there's an image

            const booth = document.createElement('div');
            booth.classList.add('booth', 'status-' + boothStatus);
            booth.innerText = boothName;
            booth.style.left = b_position_x.value + 'px';
            booth.style.top = b_position_y.value + 'px';

            // Add additional data as attributes
            booth.setAttribute('data-price', boothPrice);
            booth.setAttribute('data-description', boothDescription);
            // if (boothIcon) {
            //     booth.setAttribute('data-image', boothIcon.name); // Store the image filename or path
            // }

            booth.draggable = true;

            booths.push(booth); // Add to the array
            mapCanvas.appendChild(booth);

            console.log(
                `New Booth: ${boothName} added at X:${b_position_x.value}, Y:${b_position_y.value}, Price: ${boothPrice}, Description: ${boothDescription}`
            );
        });









        $('#addLabelBtn').click(function(e) {
            e.preventDefault();
            const labelName = $('#labelName').val();
            const labelColor = $('#labelColor').val();
            const labelDescription = $('#labelDescription').val();

            const label = document.createElement('div');
            label.classList.add('label');
            label.style.backgroundColor = labelColor;
            label.innerText = labelName;
            label.style.left = l_position_x.value + 'px';
            label.style.top = l_position_y.value + 'px';

            labels.push(label); // Add to the array
            mapCanvas.appendChild(label);

            console.log(`New Label: ${labelName} added at X:${l_position_x.value}, Y:${l_position_y.value}`);
        });



        interact('.booth').draggable({
            listeners: {
                move(event) {
                    const target = event.target;
                    const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                    const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                    target.style.transform = `translate(${x}px, ${y}px)`;

                    target.setAttribute('data-x', x);
                    target.setAttribute('data-y', y);

                    // Optionally send booth x, y updates via AJAX here
                }
            }
        });

        interact('.label').draggable({
            listeners: {
                move(event) {
                    const target = event.target;
                    const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                    const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                    target.style.transform = `translate(${x}px, ${y}px)`;

                    target.setAttribute('data-x', x);
                    target.setAttribute('data-y', y);

                    // Optionally send label x, y updates via AJAX here
                }
            }
        });
    </script>



    <script>
        // chini ni script inayo enda kusave laout yani labels zote na booths
        // Function to extract translateX and translateY from the transform style
        function getTranslateValues(element) {
            const style = window.getComputedStyle(element);
            const matrix = new WebKitCSSMatrix(style.transform);

            return {
                x: matrix.m41, // translateX value
                y: matrix.m42 // translateY value
            };
        }

        // Event listener for the Save Layout button
        $('#save-layout-button').click(function() {

            const boothData = booths.map((booth, index) => {
                const position = getTranslateValues(booth); // Correctly assign the position

                return {
                    name: booth.innerText,
                    map_id: booth_map_id.value,
                    status: booth.classList.contains('status-available') ? 'available' : booth.classList
                        .contains('status-reserved') ? 'reserved' : 'occupied',
                    price: booth.getAttribute('data-price'),
                    position_x: parseFloat(booth.style.left), // Access inline style for left position
                    position_y: parseFloat(booth.style.top), // Access inline style for top position
                    transform_x: parseFloat(position.x),
                    transform_y: parseFloat(position.y),
                    description: booth.getAttribute('data-description') || null,
                };
            });

            const labelData = labels.map((label) => {
                const position = getTranslateValues(label); // Correctly assign the position

                return {
                    name: label.innerText,
                    map_id: label_map_id.value,
                    color: label.style.backgroundColor,
                    description: label.getAttribute('data-description') || null,
                    position_x: parseFloat(label.style.left),
                    position_y: parseFloat(label.style.top),
                    transform_x: parseFloat(position.x),
                    transform_y: parseFloat(position.y),
                };
            });

            console.log(boothData);
            console.log(labelData);

            // Send the data to the controller via AJAX
            $.ajax({
                url: '{{ route('save.layout') }}', // your defined route for saving layout
                method: 'POST',
                data: {
                    booths: boothData,
                    labels: labelData,
                    _token: '{{ csrf_token() }}' // include CSRF token for Laravel
                },
                success: function(response) {
                    // Handle success response
                    // alert('Layout saved successfully!');
                    swal("Good job!", "Layout saved successfully!", "success");
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error saving layout:', error);
                    // alert('Failed to save layout. Please try again.');
                    swal("ERROR!", "Failed to save Layout!", "warning");
                }
            });
        });


        // down is for changing x and y postions just on boothName change
        document.getElementById('boothName').addEventListener('change', function() {
            let xPos = (Math.random() * (mapCanvas.clientWidth - 100)).toFixed(1);
            let yPos = (Math.random() * (mapCanvas.clientHeight - 50)).toFixed(1);


            // alert(document.classList('booth').getAttribute('data-price'));
            // booth.setAttribute('data-price', boothPrice);
            // Set the values
            b_position_x.value = xPos;
            b_position_y.value = yPos;

            l_position_x.value = (xPos / 2).toFixed(1);
            l_position_y.value = (yPos / 2).toFixed(1);
        });
    </script>

    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

</body>

</html>
