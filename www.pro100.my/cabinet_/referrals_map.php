<?php
include('../inc/conf.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<html>
	<head>
		<link rel='shortcut icon' href='/favicon.ico'>
		<meta charset='utf-8'>
		<title>Ваша реферальная сеть [<?=$Opt::$site;?>]</title>
		<style>
		@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,700);
			body{overflow:hidden;background-color:#f1f1f1;}
			.header{position:absolute;top:0;left:0;width:100%;font-size:20px;text-align:center;padding:10px;background:rgba(0,0,0,.1);font-family:"Noto Sans",sans-serif;box-sizing:border-box;}
			.node{cursor:pointer;}
			.overlay{background-color:#EEE;}
			.node circle{fill:#fff;stroke:#0ab59f;stroke-width:1.5px;}
			.node text{font-size:10px;font-family:sans-serif;}
			.link{fill:none;stroke:#ccc;stroke-width:1.5px;}
			.templink{fill:none;stroke:red;stroke-width:3px;}
			.ghostCircle.show{display:block;}
			.ghostCircle,.activeDrag .ghostCircle{display:none;}
		</style>
		<script src='/static/cabinet/js/jquery-3.1.0.min.js'></script>
		<script src='/static/cabinet/js/d3.v3.min.js'></script>
		<script>
			// treeJSON = d3.json("flare.json", function(error, treeData){
				
			// });
			function initTree(treeData){
				// Calculate total nodes, max label length
				var totalNodes = 0;
				var maxLabelLength = 0;
				// variables for drag/drop
				var selectedNode = null;
				var draggingNode = null;
				// panning variables
				var panSpeed = 200;
				var panBoundary = 20; // Within 20px from edges will pan when dragging.
				// Misc. variables
				var i = 0;
				var duration = 750;
				var root;

				// size of the diagram
				var viewerWidth = $(document).width();
				var viewerHeight = $(document).height();

				var tree = d3.layout.tree()
					.size([viewerHeight, viewerWidth]);

				// define a d3 diagonal projection for use by the node paths later on.
				var diagonal = d3.svg.diagonal()
					.projection(function(d) {
						return [d.y, d.x];
					});

				// A recursive helper function for performing some setup by walking through all nodes

				function visit(parent, visitFn, childrenFn) {
					if (!parent) return;

					visitFn(parent);

					var children = childrenFn(parent);
					if (children) {
						var count = children.length;
						for (var i = 0; i < count; i++) {
							visit(children[i], visitFn, childrenFn);
						}
					}
				}

				// Call visit function to establish maxLabelLength
				visit(treeData, function(d) {
					totalNodes++;
					maxLabelLength = Math.max(d.name.length, maxLabelLength);

				}, function(d) {
					return d.children && d.children.length > 0 ? d.children : null;
				});


				// sort the tree according to the node names

				function sortTree() {
					tree.sort(function(a, b) {
						return b.name.toLowerCase() < a.name.toLowerCase() ? 1 : -1;
					});
				}
				// Sort the tree initially incase the JSON isn't in a sorted order.
				sortTree();

				// TODO: Pan function, can be better implemented.

				function pan(domNode, direction) {
					var speed = panSpeed;
					if (panTimer) {
						clearTimeout(panTimer);
						translateCoords = d3.transform(svgGroup.attr("transform"));
						if (direction == 'left' || direction == 'right') {
							translateX = direction == 'left' ? translateCoords.translate[0] + speed : translateCoords.translate[0] - speed;
							translateY = translateCoords.translate[1];
						} else if (direction == 'up' || direction == 'down') {
							translateX = translateCoords.translate[0];
							translateY = direction == 'up' ? translateCoords.translate[1] + speed : translateCoords.translate[1] - speed;
						}
						scaleX = translateCoords.scale[0];
						scaleY = translateCoords.scale[1];
						scale = zoomListener.scale();
						svgGroup.transition().attr("transform", "translate(" + translateX + "," + translateY + ")scale(" + scale + ")");
						d3.select(domNode).select('g.node').attr("transform", "translate(" + translateX + "," + translateY + ")");
						zoomListener.scale(zoomListener.scale());
						zoomListener.translate([translateX, translateY]);
						panTimer = setTimeout(function() {
							pan(domNode, speed, direction);
						}, 50);
					}
				}

				// Define the zoom function for the zoomable tree

				function zoom() {
					svgGroup.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
				}


				// define the zoomListener which calls the zoom function on the "zoom" event constrained within the scaleExtents
				var zoomListener = d3.behavior.zoom().scaleExtent([0.1, 3]).on("zoom", zoom);
								// define the baseSvg, attaching a class for styling and the zoomListener
				var baseSvg = d3.select("#tree-container").append("svg")
					.attr("width", viewerWidth)
					.attr("height", viewerHeight)
					.attr("class", "overlay")
					.call(zoomListener);

								var overCircle = function(d) {
					selectedNode = d;
					updateTempConnector();
				};
				var outCircle = function(d) {
					selectedNode = null;
					updateTempConnector();
				};

				// Function to update the temporary connector indicating dragging affiliation
				var updateTempConnector = function() {
					var data = [];
					if (draggingNode !== null && selectedNode !== null) {
						// have to flip the source coordinates since we did this for the existing connectors on the original tree
						data = [{
							source: {
								x: selectedNode.y0,
								y: selectedNode.x0
							},
							target: {
								x: draggingNode.y0,
								y: draggingNode.x0
							}
						}];
					}
					var link = svgGroup.selectAll(".templink").data(data);

					link.enter().append("path")
						.attr("class", "templink")
						.attr("d", d3.svg.diagonal())
						.attr('pointer-events', 'none');

					link.attr("d", d3.svg.diagonal());

					link.exit().remove();
				};

				// Function to center node when clicked/dropped so node doesn't get lost when collapsing/moving with large amount of children.

				function centerNode(source) {
					scale = zoomListener.scale();
					x = -source.y0;
					y = -source.x0;
					x = x * scale + viewerWidth / 2;
					y = y * scale + viewerHeight / 2;
					d3.select('g').transition()
						.duration(duration)
						.attr("transform", "translate(" + x + "," + y + ")scale(" + scale + ")");
					zoomListener.scale(scale);
					zoomListener.translate([x, y]);
				}

				// Toggle children function

				function toggleChildren(d) {
					if (d.children) {
						d._children = d.children;
						d.children = null;
					} else if (d._children) {
						d.children = d._children;
						d._children = null;
					}
					return d;
				}

				// Toggle children on click.

				function click(d) {
					if (d3.event.defaultPrevented) return; // click suppressed
					d = toggleChildren(d);
					update(d);
					centerNode(d);
				}

				function update(source) {
					// Compute the new height, function counts total children of root node and sets tree height accordingly.
					// This prevents the layout looking squashed when new nodes are made visible or looking sparse when nodes are removed
					// This makes the layout more consistent.
					var levelWidth = [1];
					var childCount = function(level, n) {

						if (n.children && n.children.length > 0) {
							if (levelWidth.length <= level + 1) levelWidth.push(0);

							levelWidth[level + 1] += n.children.length;
							n.children.forEach(function(d) {
								childCount(level + 1, d);
							});
						}
					};
					childCount(0, root);
					var newHeight = d3.max(levelWidth) * 25; // 25 pixels per line  
					tree = tree.size([newHeight, viewerWidth]);

					// Compute the new tree layout.
					var nodes = tree.nodes(root).reverse(),
						links = tree.links(nodes);

					// Set widths between levels based on maxLabelLength.
					nodes.forEach(function(d) {
						d.y = (d.depth * (maxLabelLength * 10)); //maxLabelLength * 10px
						// alternatively to keep a fixed scale one can set a fixed depth per level
						// Normalize for fixed-depth by commenting out below line
						// d.y = (d.depth * 500); //500px per level.
					});

					// Update the nodes…
					node = svgGroup.selectAll("g.node")
						.data(nodes, function(d) {
							return d.id || (d.id = ++i);
						});

					// Enter any new nodes at the parent's previous position.
					var nodeEnter = node.enter().append("g")
												.attr("class", "node")
						.attr("transform", function(d) {
							return "translate(" + source.y0 + "," + source.x0 + ")";
						})
						.on('click', click);

					nodeEnter.append("circle")
						.attr('class', 'nodeCircle')
						.attr("r", 0)
						.style("fill", function(d) {
							return d._children ? "lightsteelblue" : "#fff";
						});

					nodeEnter.append("text")
						.attr("dy", ".35em")
						.attr('class', 'nodeText')
						.style("fill-opacity", 0)
						.attr("x", function(d) {
							return d.children || d._children ? -10 : 10;
						})
						.attr("text-anchor", function(d) {
							return d.children || d._children ? "end" : "start";
						})
						.append("tspan")
						.text(function(d) {
							return d.name;
						});
					// phantom node to give us mouseover in a radius around it
					nodeEnter.append("circle")
						.attr('class', 'ghostCircle')
						.attr("r", 30)
						.attr("opacity", 0.2) // change this to zero to hide the target area
						.style("fill", "red")
						.attr('pointer-events', 'mouseover')
						.on("mouseover", function(node) {
							overCircle(node);
						})
						.on("mouseout", function(node) {
							outCircle(node);
						});

					// Update the text to reflect whether node has children or not.
					// node.select('text');
					// Change the circle fill depending on whether it has children and is collapsed
					node.select("circle.nodeCircle")
						.attr("r", 6)
						.style("fill", function(d) {
							return d._children ? "lightsteelblue" : "#fff";
						});

					// Transition nodes to their new position.
					var nodeUpdate = node.transition()
						.duration(duration)
						.attr("transform", function(d) {
							return "translate(" + d.y + "," + d.x + ")";
						});

					// Fade the text in
					nodeUpdate.select("text")
						.style("fill-opacity", 1);

					// Transition exiting nodes to the parent's new position.
					var nodeExit = node.exit().transition()
						.duration(duration)
						.attr("transform", function(d) {
							return "translate(" + source.y + "," + source.x + ")";
						})
						.remove();

					nodeExit.select("circle")
						.attr("r", 0);

					nodeExit.select("text")
						.style("fill-opacity", 0);

					// Update the links…
					var link = svgGroup.selectAll("path.link")
						.data(links, function(d) {
							return d.target.id;
						});

					// Enter any new links at the parent's previous position.
					link.enter().insert("path", "g")
						.attr("class", "link")
						.attr("d", function(d) {
							var o = {
								x: source.x0,
								y: source.y0
							};
							return diagonal({
								source: o,
								target: o
							});
						});

					// Transition links to their new position.
					link.transition()
						.duration(duration)
						.attr("d", diagonal);

					// Transition exiting nodes to the parent's new position.
					link.exit().transition()
						.duration(duration)
						.attr("d", function(d) {
							var o = {
								x: source.x,
								y: source.y
							};
							return diagonal({
								source: o,
								target: o
							});
						})
						.remove();

					// Stash the old positions for transition.
					nodes.forEach(function(d) {
						d.x0 = d.x;
						d.y0 = d.y;
					});
				}

				// Append a group which holds all nodes and which the zoom Listener can act upon.
				var svgGroup = baseSvg.append("g");

				// Define the root
				root = treeData;
				root.x0 = viewerHeight / 2;
				root.y0 = 0;

				// Layout the tree initially and center on the root node.
				update(root);
				centerNode(root);
				
				console.log(root);
			}
		</script>
	</head>
	<body>
		<div class='header'>Ваша реферальная сеть [<?=$Opt::$site;?>]</div>
		<div id="tree-container"></div>
		<script>
			// $("#preloader svg").after("Идет построение структуры...");
			
			var $html =	$("<div style='position:fixed;top:0;left:0;height:100%;width:100%;'>" +
							"<div style='display:table;width:100%;height:100%;'>" +
								"<div style='display:table-cell;vertical-align:middle;text-align:center;'>" +
									"Идет построение структуры" +
									"<div class='ajax_loading'><div></div><div></div><div></div></div>" +
								"</div>" +
							"</div>" +
						"</div>");
			
			$("body").append($html);
			
			$.ajax({
				url: "/actions/referrals_map.php",
				data: "act=get_ref_tree",
				type: "POST",
				dataType: "json",
				success: function(data){
					initTree(data);
					
					$html.fadeOut(function(){
						$(this).remove();
					});
				}
			});
		</script>
	</body>
</html>