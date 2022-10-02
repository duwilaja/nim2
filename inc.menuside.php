<?php include "inc.header.php"; ?>
		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Overview</div>
					<div class="menu-item ">
						<a href="home<?php echo $ext?>" class="menu-link">
							<span class="menu-icon"><i class="bi bi-cpu"></i></span>
							<span class="menu-text">Dashboard View</span>
						</a>
					</div>
					<div class="menu-item ">
						<a href="org<?php echo $ext?>" class="menu-link">
							<span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
							<span class="menu-text">Business View</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="topo<?php echo $ext?>" class="menu-link">
							<span class="menu-icon"><i class="bi bi-diagram-2"></i></span>
							<span class="menu-text">Topology View</span>
						</a>
					</div>
					<!--div class="menu-item">
						<a href="rootcause.html" class="menu-link">
							<span class="menu-icon"><i class="bi bi-hdd-network"></i></span>
							<span class="menu-text">Root Cause Analysis</span>
						</a>
					</div-->
					<div class="menu-header">Components</div>
					<div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-hdd-rack"></i>
								<!--span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span-->
							</div>
							<div class="menu-text d-flex align-items-center">Objects</div> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="n_device<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">Devices</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="n_location<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">Locations</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="p_snmpd<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">SNMP</div>
								</a>
							</div>
						</div>
					</div>
					<!--div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-heart-pulse"></i>
								<!--span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span--
							</div>
							<div class="menu-text d-flex align-items-center">Health</div> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="memory.html"  class="menu-link">
									<div class="menu-text">Memory</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="processor.html" class="menu-link">
									<div class="menu-text">Processor</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="storage.html"  class="menu-link">
									<div class="menu-text">Storage</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="temperature.html"  class="menu-link">
									<div class="menu-text">Temperature</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="voltage.html" 
								 class="menu-link">
									<div class="menu-text">Voltage</div>
								</a>
							</div>
						</div>
					</div-->
					<div class="menu-item has-sub">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-journals"></i></span>
							<span class="menu-text">Reports</span> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="r_device<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Devices</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="r_location<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Locations</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="r_perf<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Performance</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="r_sla<?php echo $ext?>" class="menu-link">
									<span class="menu-text">SLA</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="r_severity<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Severity</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="r_updown<?php echo $ext?>" class="menu-link">
									<span class="menu-text">UP/Down</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item has-sub">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-gear"></i></span>
							<span class="menu-text">Setup</span> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="m_device<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Devices</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="m_location<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Locations</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="m_topo<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Topology</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="m_sla<?php echo $ext?>" class="menu-link">
									<span class="menu-text">SLA</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="m_severity<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Severity</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="m_bg<?php echo $ext?>" class="menu-link">
									<span class="menu-text">Reload Controls</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-wrench"></i>
								<!--span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span-->
							</div>
							<div class="menu-text d-flex align-items-center">Tools</div> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="t_ping<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">Ping</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="t_trace<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">Trace</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="t_snmp<?php echo $ext?>"  class="menu-link">
									<div class="menu-text">SNMP</div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		</div>
		<!-- END #sidebar -->
			
		<!-- BEGIN mobile-sidebar-backdrop -->
		<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
		<!-- END mobile-sidebar-backdrop -->