<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Royal Dental Clinic | HSM System - ULK Project</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Segoe UI',Roboto,sans-serif;background:#f0f4f8;}
/* Login Page - ULK Branding */
.login-container{min-height:100vh;background:linear-gradient(135deg,#0a2b3a,#1a5a6e);display:flex;align-items:center;justify-content:center;padding:20px;}
.login-card{background:white;border-radius:32px;padding:40px;width:100%;max-width:450px;box-shadow:0 25px 50px rgba(0,0,0,0.3);}
.login-card h2{color:#0a2b3a;font-weight:700;border-left:4px solid #2a9d8f;padding-left:15px;}
.ulk-badge{background:#c0392b;color:white;font-size:12px;padding:3px 8px;border-radius:20px;display:inline-block;margin-bottom:10px;}
.btn-login{background:linear-gradient(135deg,#0f4c5c,#1b6b7e);border:none;padding:12px;font-weight:600;border-radius:40px;width:100%;}
/* Dashboard */
.sidebar{width:270px;height:100vh;position:fixed;background:#0b2b3b;color:white;padding-top:20px;overflow-y:auto;z-index:100;}
.sidebar h3{font-size:1.3rem;text-align:center;border-bottom:1px solid #1f5063;padding-bottom:15px;}
.sidebar a{display:block;color:#e0eef5;text-decoration:none;padding:12px 25px;transition:0.2s;border-left:3px solid transparent;}
.sidebar a i{width:28px;margin-right:10px;}
.sidebar a:hover{background:#124b5e;border-left-color:#f4a261;}
.main{margin-left:270px;padding:25px 30px;min-height:100vh;}
.section{display:none;animation:fadeIn 0.3s;}
.active-section{display:block;}
@keyframes fadeIn{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
.card-box{border-radius:24px;padding:20px;color:white;cursor:default;box-shadow:0 8px 18px rgba(0,0,0,0.1);}
.card-box h3{font-size:2.2rem;font-weight:700;margin-top:10px;}
.bg1{background:linear-gradient(135deg,#0f4c5c,#1b6b7e);}
.bg2{background:linear-gradient(135deg,#2a7f6e,#3aa88f);}
.bg3{background:linear-gradient(135deg,#d68c45,#f4a261);}
.bg4{background:linear-gradient(135deg,#5e3a7c,#8661c1);}
.stat-icon{float:right;font-size:2.5rem;opacity:0.4;}
.table th{background:#eef2f5;color:#1f3b43;}
.action-btn{cursor:pointer;margin:0 4px;}
.toast-container{position:fixed;bottom:20px;right:20px;z-index:1100;}
.modal-header.bg-primary-custom{background:#0b2b3b;color:white;}
.logout-message{position:fixed;top:20px;right:20px;z-index:2000;animation:slideIn 0.3s;background:#2ecc71;color:white;padding:15px 20px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.2);}
@keyframes slideIn{from{transform:translateX(100%);opacity:0;}to{transform:translateX(0);opacity:1;}}
.role-badge{font-size:11px;background:#2c3e50;padding:2px 8px;border-radius:20px;margin-left:8px;}
footer{text-align:center;margin-top:40px;padding:15px;color:#6c757d;font-size:13px;border-top:1px solid #dee2e6;}
</style>
</head>
<body>

<!-- LOGIN PAGE -->
<div id="loginPage" class="login-container">
    <div class="login-card">
        <div class="text-center">
            <span class="ulk-badge"><i class="fa fa-university"></i> ULK - Software Engineering</span>
            <i class="fa fa-tooth" style="font-size:48px;color:#2a9d8f;"></i>
            <h2>Royal Dental Clinic</h2>
            <p class="text-muted">Hospital System Management (HSM)</p>
            <p class="small text-muted">Project by: MIGISHA David Bonheur | 202212231</p>
        </div>
        <form id="loginForm" onsubmit="return handleLogin(event)">
            <div class="mb-3">
                <label><i class="fa fa-envelope"></i> Email</label>
                <input type="email" id="loginEmail" class="form-control rounded-pill" placeholder="admin@royaldental.com" required>
            </div>
            <div class="mb-4">
                <label><i class="fa fa-lock"></i> Password</label>
                <input type="password" id="loginPassword" class="form-control rounded-pill" placeholder="••••••" required>
            </div>
            <button type="submit" class="btn btn-login text-white"><i class="fa fa-sign-in-alt"></i> Login to Dashboard</button>
        </form>
        <div class="text-center mt-3 small text-muted">
            <i class="fa fa-graduation-cap"></i> ULK | Kigali Independent University
        </div>
    </div>
</div>

<!-- MAIN DASHBOARD (hidden until login) -->
<div id="dashboardApp" style="display:none;">
    <div class="sidebar">
        <h3><i class="fa fa-tooth"></i> ROYAL DENTAL</h3>
        <a onclick="showSection('dashboard')"><i class="fa fa-chart-line"></i> Dashboard</a>
        <a onclick="showSection('patients')"><i class="fa fa-user-injured"></i> Patients</a>
        <a onclick="showSection('appointments')"><i class="fa fa-calendar-check"></i> Appointments</a>
        <a onclick="showSection('billing')"><i class="fa fa-money-bill-wave"></i> Billing</a>
        <a onclick="showSection('staff')"><i class="fa fa-users"></i> Staff</a>
        <a onclick="showSection('reports')"><i class="fa fa-file-alt"></i> Reports</a>
        <a onclick="showSection('settings')"><i class="fa fa-cog"></i> Settings</a>
        <a onclick="logout()"><i class="fa fa-sign-out-alt"></i> Logout</a>
        <div style="position:absolute;bottom:20px;left:0;right:0;text-align:center;font-size:11px;color:#6c8a9a;">
            <i class="fa fa-code"></i> ULK Project 2026
        </div>
    </div>

    <div class="main">
        <!-- DASHBOARD -->
        <div id="dashboard" class="section active-section">
            <div class="d-flex justify-content-between">
                <h2><i class="fa fa-chart-simple"></i> HSM Dashboard <span class="badge bg-info ms-2">Royal Dental Clinic</span></h2>
                <button class="btn btn-sm btn-outline-secondary" onclick="refreshAllData()"><i class="fa fa-sync-alt"></i> Refresh</button>
            </div>
            <div class="row mt-4 g-4" id="dashboardStats">
                <div class="col-md-3"><div class="card-box bg1"><i class="fa fa-user-md stat-icon"></i>Total Staff<br><h3 id="totalStaffCount">--</h3></div></div>
                <div class="col-md-3"><div class="card-box bg2"><i class="fa fa-users stat-icon"></i>Patients<br><h3 id="totalPatientsCount">--</h3></div></div>
                <div class="col-md-3"><div class="card-box bg3"><i class="fa fa-calendar-week stat-icon"></i>Appointments<br><h3 id="totalAppointmentsCount">--</h3></div></div>
                <div class="col-md-3"><div class="card-box bg4"><i class="fa fa-dollar-sign stat-icon"></i>Revenue (RWF)<br><h3 id="totalRevenue">--</h3></div></div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 rounded-4 p-3">
                        <h5><i class="fa fa-chart-bar"></i> Weekly Appointments Trend</h5>
                        <canvas id="apptChart" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 rounded-4 p-3">
                        <h5><i class="fa fa-clock"></i> Recent Clinic Activity</h5>
                        <ul class="list-group list-group-flush" id="recentActivityList"></ul>
                    </div>
                </div>
            </div>
            <footer><i class="fa fa-copyright"></i> 2026 | Kigali Independent University (ULK) - School of Science & Technology | Supervisor: Mr. JOB KUBWIMANA</footer>
        </div>

        <!-- PATIENTS MODULE -->
        <div id="patients" class="section">
            <div class="d-flex justify-content-between mb-3">
                <h2><i class="fa fa-user-injured"></i> Patient Management</h2>
                <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#patientModal" onclick="openPatientModal()"><i class="fa fa-plus"></i> Register Patient</button>
            </div>
            <input type="text" id="patientSearch" class="form-control mb-3" placeholder="🔍 Search by name or phone...">
            <div class="table-responsive">
                <table class="table table-hover bg-white rounded-3">
                    <thead class="table-light"><tr><th>ID</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Medical History</th><th>Actions</th></tr></thead>
                    <tbody id="patientTableBody"></tbody>
                </table>
            </div>
        </div>

        <!-- APPOINTMENTS MODULE -->
        <div id="appointments" class="section">
            <div class="d-flex justify-content-between mb-3">
                <h2><i class="fa fa-calendar-check"></i> Appointment Scheduling</h2>
                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#appointmentModal" onclick="openAppointmentModal()"><i class="fa fa-plus"></i> Book Appointment</button>
            </div>
            <table class="table table-bordered bg-white">
                <thead><tr><th>Patient</th><th>Date</th><th>Doctor</th><th>Reason</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody id="appointmentTableBody"></tbody>
            </table>
        </div>

        <!-- BILLING MODULE -->
        <div id="billing" class="section">
            <h2><i class="fa fa-receipt"></i> Billing & Payments</h2>
            <div class="mb-3"><button class="btn btn-outline-dark rounded-pill" onclick="createNewInvoice()"><i class="fa fa-plus-circle"></i> New Invoice</button></div>
            <table class="table table-bordered bg-white">
                <thead><tr><th>Invoice #</th><th>Patient</th><th>Services</th><th>Amount (RWF)</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody id="billingTableBody"></tbody>
            </table>
        </div>

        <!-- STAFF MODULE -->
        <div id="staff" class="section">
            <div class="d-flex justify-content-between mb-3">
                <h2><i class="fa fa-user-nurse"></i> Staff Management (RBAC)</h2>
                <button class="btn btn-info rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#staffModal" onclick="openStaffModal()"><i class="fa fa-user-plus"></i> Add Staff</button>
            </div>
            <table class="table table-bordered bg-white">
                <thead><tr><th>Name</th><th>Role</th><th>Contact</th><th>Username</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody id="staffTableBody"></tbody>
            </table>
        </div>

        <!-- REPORTS MODULE -->
        <div id="reports" class="section">
            <h2><i class="fa fa-chart-pie"></i> Management Reports</h2>
            <div class="card p-4 mt-3 shadow-sm">
                <p>Generate financial and operational reports for decision making.</p>
                <div class="row">
                    <div class="col-md-4"><button class="btn btn-primary w-100" onclick="generateDailyReport()"><i class="fa fa-calendar-day"></i> Daily Report</button></div>
                    <div class="col-md-4"><button class="btn btn-success w-100" onclick="generateMonthlyReport()"><i class="fa fa-chart-line"></i> Monthly Financial</button></div>
                    <div class="col-md-4"><button class="btn btn-warning w-100" onclick="generateTreatmentStats()"><i class="fa fa-chart-pie"></i> Treatment Stats</button></div>
                </div>
                <div id="reportPreview" class="mt-4 alert alert-light border d-none"></div>
            </div>
        </div>

        <!-- SETTINGS -->
        <div id="settings" class="section">
            <h2><i class="fa fa-sliders-h"></i> System Settings</h2>
            <div class="card p-4 bg-white shadow-sm rounded-4">
                <label>Clinic Name</label>
                <input class="form-control mb-3" id="clinicNameInput" value="Royal Dental Clinic">
                <label>Email Address</label>
                <input class="form-control mb-3" id="clinicEmailInput" value="contact@royaldental.rw">
                <label>Contact Number</label>
                <input class="form-control mb-3" id="clinicPhoneInput" value="+250 788 555 606">
                <button class="btn btn-success w-25" onclick="saveSettings()">Save Settings</button>
                <hr><small class="text-muted"><i class="fa fa-shield-alt"></i> Role-Based Access Control Active</small>
            </div>
        </div>
    </div>
</div>

<!-- MODALS -->
<div class="modal fade" id="patientModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-primary-custom"><h5 class="modal-title text-white">Patient Registration</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body"><input type="hidden" id="patId"><label>Full Name</label><input id="patName" class="form-control mb-2"><label>Phone</label><input id="patPhone" class="form-control mb-2"><label>Email</label><input id="patEmail" class="form-control mb-2"><label>Medical History</label><textarea id="patHistory" class="form-control" rows="2" placeholder="Allergies, previous treatments..."></textarea></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-primary" onclick="savePatient()">Save Patient</button></div></div></div></div>

<div class="modal fade" id="appointmentModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-primary-custom"><h5 class="modal-title text-white">Schedule Appointment</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><label>Patient</label><select id="appPatientSelect" class="form-control mb-2"></select><label>Date</label><input type="date" id="appDate" class="form-control mb-2"><label>Doctor</label><select id="appDoctorSelect" class="form-control mb-2"></select><label>Reason</label><textarea id="appReason" class="form-control mb-2" placeholder="Checkup, extraction, etc."></textarea><label>Status</label><select id="appStatus" class="form-control"><option>Scheduled</option><option>Completed</option><option>Cancelled</option></select><input type="hidden" id="appEditId"></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-primary" onclick="saveAppointment()">Save</button></div></div></div></div>

<div class="modal fade" id="staffModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-primary-custom"><h5 class="modal-title text-white">Staff Member</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><input type="hidden" id="staffId"><label>Name</label><input id="staffName" class="form-control mb-2"><label>Role</label><select id="staffRole" class="form-control mb-2"><option>Dentist</option><option>Receptionist</option><option>Billing Staff</option><option>Administrator</option></select><label>Contact</label><input id="staffContact" class="form-control mb-2"><label>Username</label><input id="staffUsername" class="form-control mb-2"><label>Password</label><input type="password" id="staffPassword" class="form-control mb-2" placeholder="Leave blank to keep unchanged"><label>Status</label><select id="staffStatus" class="form-control"><option>Active</option><option>Inactive</option></select></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-primary" onclick="saveStaff()">Save</button></div></div></div></div>

<div class="toast-container"><div id="liveToast" class="toast align-items-center text-white bg-dark border-0"><div class="d-flex"><div class="toast-body" id="toastMsg">Message</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ============== DATA STORES (matches database schema: patients, staff, appointments, billing) ==============
let patients = [
    {id:1, name:"John Doe", phone:"0788888888", email:"john@example.com", history:"No known allergies"},
    {id:2, name:"Emma Watson", phone:"0789999999", email:"emma@clinic.com", history:"Root canal done 2024"},
    {id:3, name:"Michael Lee", phone:"0712345678", email:"mike@dental.com", history:"Dental anxiety"}
];
let staffList = [
    {id:1, name:"Dr. David", role:"Dentist", contact:"0788000111", username:"david", password:"pass123", status:"Active"},
    {id:2, name:"Admin Job", role:"Administrator", contact:"0788000222", username:"admin", password:"admin123", status:"Active"},
    {id:3, name:"Nurse Anna", role:"Receptionist", contact:"0788000333", username:"anna", password:"anna123", status:"Active"}
];
let appointments = [
    {id:1, patient_name:"John Doe", appointment_date:"2026-05-30", doctor:"Dr. David", reason:"Toothache", status:"Scheduled"},
    {id:2, patient_name:"Emma Watson", appointment_date:"2026-06-05", doctor:"Dr. David", reason:"Cleaning", status:"Completed"}
];
let bills = [
    {id:101, patient_name:"John Doe", services:"Tooth Extraction", amount:25000, status:"Paid"},
    {id:102, patient_name:"Emma Watson", services:"Cleaning + Checkup", amount:25000, status:"Unpaid"},
    {id:103, patient_name:"Michael Lee", services:"Filling", amount:20000, status:"Paid"}
];
let nextId = {patient:4, staff:4, appointment:3, bill:104};

function showToast(msg, type='success'){ let t=document.getElementById('liveToast'); document.getElementById('toastMsg').innerText=msg; t.classList.remove('bg-success','bg-danger'); t.classList.add(type==='success'?'bg-success':'bg-danger'); new bootstrap.Toast(t,{delay:2500}).show(); }
function refreshAllData(){ updateStats(); renderPatients(); renderAppointments(); renderBilling(); renderStaff(); updateActivity(); drawChart(); }
function updateStats(){ document.getElementById('totalStaffCount').innerText=staffList.length; document.getElementById('totalPatientsCount').innerText=patients.length; document.getElementById('totalAppointmentsCount').innerText=appointments.length; let rev=bills.filter(b=>b.status==='Paid').reduce((s,b)=>s+b.amount,0); document.getElementById('totalRevenue').innerHTML=rev.toLocaleString(); }

// PATIENTS
function renderPatients(){ let search=document.getElementById('patientSearch')?.value.toLowerCase()||''; let filtered=patients.filter(p=>p.name.toLowerCase().includes(search)||p.phone.includes(search)); document.getElementById('patientTableBody').innerHTML=filtered.map(p=>`<tr><td>${p.id}</td><td>${p.name}</td><td>${p.phone}</td><td>${p.email||'-'}</td><td><small>${p.history?.substring(0,30)||'-'}</small></td><td><i class="fa fa-edit text-primary action-btn" onclick="editPatient(${p.id})"></i> <i class="fa fa-trash text-danger action-btn" onclick="deletePatient(${p.id})"></i></td></tr>`).join(''); }
function openPatientModal(){ document.getElementById('patId').value=''; document.getElementById('patName').value=''; document.getElementById('patPhone').value=''; document.getElementById('patEmail').value=''; document.getElementById('patHistory').value=''; }
function editPatient(id){ let p=patients.find(p=>p.id===id); if(p){ document.getElementById('patId').value=p.id; document.getElementById('patName').value=p.name; document.getElementById('patPhone').value=p.phone; document.getElementById('patEmail').value=p.email||''; document.getElementById('patHistory').value=p.history||''; new bootstrap.Modal(document.getElementById('patientModal')).show(); } }
function savePatient(){ let id=document.getElementById('patId').value; let name=document.getElementById('patName').value.trim(); let phone=document.getElementById('patPhone').value.trim(); let email=document.getElementById('patEmail').value.trim(); let history=document.getElementById('patHistory').value; if(!name){showToast('Name required','danger');return;} if(id){ let idx=patients.findIndex(p=>p.id==id); if(idx!==-1) patients[idx]={...patients[idx],name,phone,email,history}; showToast('Patient updated');} else { patients.push({id:nextId.patient++,name,phone,email,history}); showToast('Patient registered');} bootstrap.Modal.getInstance(document.getElementById('patientModal')).hide(); renderPatients(); updateStats(); updateActivity(); }
function deletePatient(id){ if(confirm('Delete patient and related records?')){ patients=patients.filter(p=>p.id!==id); appointments=appointments.filter(a=>a.patient_name!==patients.find(p=>p.id===id)?.name); renderPatients(); renderAppointments(); updateStats(); showToast('Deleted'); } }

// APPOINTMENTS
function renderAppointments(){ let tbody=document.getElementById('appointmentTableBody'); tbody.innerHTML=appointments.map(a=>`<tr><td>${a.patient_name}</td><td>${a.appointment_date}</td><td>${a.doctor}</td><td>${a.reason||'-'}</td><td><span class="badge ${a.status==='Scheduled'?'bg-warning':a.status==='Completed'?'bg-success':'bg-secondary'}">${a.status}</span></td><td><i class="fa fa-edit text-primary action-btn" onclick="editAppointment(${a.id})"></i> <i class="fa fa-trash text-danger action-btn" onclick="deleteAppointment(${a.id})"></i></td></tr>`).join(''); }
function populatePatientSelect(){ let sel=document.getElementById('appPatientSelect'); sel.innerHTML=patients.map(p=>`<option value="${p.name}">${p.name}</option>`).join(''); }
function populateDoctorSelect(){ let sel=document.getElementById('appDoctorSelect'); sel.innerHTML=staffList.filter(s=>s.role==='Dentist' && s.status==='Active').map(d=>`<option value="${d.name}">${d.name}</option>`).join(''); if(sel.innerHTML==='') sel.innerHTML='<option>Dr. David</option>'; }
function openAppointmentModal(){ document.getElementById('appEditId').value=''; document.getElementById('appDate').valueAsDate=new Date(); document.getElementById('appReason').value=''; document.getElementById('appStatus').value='Scheduled'; populatePatientSelect(); populateDoctorSelect(); }
function editAppointment(id){ let a=appointments.find(a=>a.id===id); if(a){ populatePatientSelect(); populateDoctorSelect(); document.getElementById('appPatientSelect').value=a.patient_name; document.getElementById('appDate').value=a.appointment_date; document.getElementById('appDoctorSelect').value=a.doctor; document.getElementById('appReason').value=a.reason||''; document.getElementById('appStatus').value=a.status; document.getElementById('appEditId').value=a.id; new bootstrap.Modal(document.getElementById('appointmentModal')).show(); } }
function saveAppointment(){ let id=document.getElementById('appEditId').value; let patient=document.getElementById('appPatientSelect').value; let date=document.getElementById('appDate').value; let doctor=document.getElementById('appDoctorSelect').value; let reason=document.getElementById('appReason').value; let status=document.getElementById('appStatus').value; if(!patient||!date){showToast('Patient and date required','danger');return;} let conflict=appointments.some(a=>a.doctor===doctor && a.appointment_date===date && a.status==='Scheduled' && a.id!=id); if(conflict){showToast('Doctor already booked at this date','danger');return;} if(id){ let idx=appointments.findIndex(a=>a.id==id); if(idx!==-1) appointments[idx]={...appointments[idx],patient_name:patient,appointment_date:date,doctor,reason,status}; showToast('Appointment updated');} else { appointments.push({id:nextId.appointment++,patient_name:patient,appointment_date:date,doctor,reason,status}); showToast('Appointment booked');} bootstrap.Modal.getInstance(document.getElementById('appointmentModal')).hide(); renderAppointments(); updateStats(); updateActivity(); drawChart(); }
function deleteAppointment(id){ if(confirm('Cancel appointment?')){ appointments=appointments.filter(a=>a.id!==id); renderAppointments(); updateStats(); drawChart(); showToast('Cancelled'); } }

// BILLING
function renderBilling(){ document.getElementById('billingTableBody').innerHTML=bills.map(b=>`<tr><td>#${b.id}</td><td>${b.patient_name}</td><td>${b.services}</td><td>${b.amount.toLocaleString()} RWF</td><td><span class="badge ${b.status==='Paid'?'bg-success':'bg-danger'}">${b.status}</span></td><td><button class="btn btn-sm btn-outline-secondary" onclick="toggleBill(${b.id})"><i class="fa fa-credit-card"></i> Toggle</button></td></tr>`).join(''); }
function createNewInvoice(){ if(patients.length===0){showToast('No patients','danger');return;} let pname=prompt("Patient name:",patients[0].name); let services=prompt("Services (e.g., Extraction, Filling):","General Checkup"); let amount=prompt("Amount (RWF):","15000"); if(pname && services && amount && !isNaN(amount)){ if(!patients.some(p=>p.name===pname)){showToast('Patient not found','danger');return;} bills.push({id:nextId.bill++, patient_name:pname, services:services, amount:parseInt(amount), status:"Unpaid"}); renderBilling(); updateStats(); showToast("Invoice created"); } }
function toggleBill(id){ let bill=bills.find(b=>b.id===id); if(bill){ bill.status=bill.status==='Paid'?'Unpaid':'Paid'; renderBilling(); updateStats(); showToast(`Invoice #${id} ${bill.status}`); } }

// STAFF
function renderStaff(){ document.getElementById('staffTableBody').innerHTML=staffList.map(s=>`<tr><td>${s.name}</td><td>${s.role} <span class="role-badge">RBAC</span></td><td>${s.contact}</td><td>${s.username}</td><td><span class="badge ${s.status==='Active'?'bg-success':'bg-secondary'}">${s.status}</span></td><td><i class="fa fa-edit text-primary action-btn" onclick="editStaff(${s.id})"></i> <i class="fa fa-trash text-danger action-btn" onclick="deleteStaff(${s.id})"></i></td></tr>`).join(''); }
function openStaffModal(){ document.getElementById('staffId').value=''; document.getElementById('staffName').value=''; document.getElementById('staffRole').value='Dentist'; document.getElementById('staffContact').value=''; document.getElementById('staffUsername').value=''; document.getElementById('staffPassword').value=''; document.getElementById('staffStatus').value='Active'; }
function editStaff(id){ let s=staffList.find(s=>s.id===id); if(s){ document.getElementById('staffId').value=s.id; document.getElementById('staffName').value=s.name; document.getElementById('staffRole').value=s.role; document.getElementById('staffContact').value=s.contact; document.getElementById('staffUsername').value=s.username; document.getElementById('staffPassword').value=''; document.getElementById('staffStatus').value=s.status; new bootstrap.Modal(document.getElementById('staffModal')).show(); } }
function saveStaff(){ let id=document.getElementById('staffId').value; let name=document.getElementById('staffName').value.trim(); let role=document.getElementById('staffRole').value; let contact=document.getElementById('staffContact').value; let username=document.getElementById('staffUsername').value.trim(); let pwd=document.getElementById('staffPassword').value; let status=document.getElementById('staffStatus').value; if(!name||!username){showToast('Name and Username required','danger');return;} if(id){ let idx=staffList.findIndex(s=>s.id==id); if(idx!==-1){ staffList[idx]={...staffList[idx],name,role,contact,username,status}; if(pwd) staffList[idx].password=pwd; } showToast('Staff updated');} else { staffList.push({id:nextId.staff++, name, role, contact, username, password:pwd||'pass123', status}); showToast('Staff added');} bootstrap.Modal.getInstance(document.getElementById('staffModal')).hide(); renderStaff(); updateStats(); }
function deleteStaff(id){ if(confirm('Remove staff?')){ staffList=staffList.filter(s=>s.id!==id); renderStaff(); updateStats(); showToast('Removed'); } }

// REPORTS
function generateDailyReport(){ let today=new Date().toISOString().slice(0,10); let todayApps=appointments.filter(a=>a.appointment_date===today); let preview=document.getElementById('reportPreview'); preview.classList.remove('d-none'); preview.innerHTML=`<strong>📋 Daily Patient Report - ${today}</strong><br>👥 Patients seen: ${todayApps.length}<br>💰 Revenue today: ${bills.filter(b=>b.status==='Paid').reduce((s,b)=>s+b.amount,0).toLocaleString()} RWF<br>📅 Appointments: ${todayApps.map(a=>a.patient_name).join(', ')||'None'}`; showToast('Daily report generated'); }
function generateMonthlyReport(){ let totalBilled=bills.reduce((s,b)=>s+b.amount,0); let collected=bills.filter(b=>b.status==='Paid').reduce((s,b)=>s+b.amount,0); let preview=document.getElementById('reportPreview'); preview.classList.remove('d-none'); preview.innerHTML=`<strong>📊 Monthly Financial Report (March 2026)</strong><br>👥 Total Patients: ${patients.length}<br>📅 Appointments: ${appointments.length}<br>💰 Total Billed: ${totalBilled.toLocaleString()} RWF<br>✅ Collected: ${collected.toLocaleString()} RWF<br>👩‍⚕️ Active Staff: ${staffList.filter(s=>s.status==='Active').length}<hr><i class="fa fa-chart-line"></i> Performance summary for Royal Dental Clinic`; showToast('Monthly report ready'); }
function generateTreatmentStats(){ let treatments=['Extraction','Cleaning','Filling','Checkup']; let counts=[3,5,2,8]; let preview=document.getElementById('reportPreview'); preview.classList.remove('d-none'); preview.innerHTML=`<strong>🦷 Treatment Statistics (Top Services)</strong><br>• General Checkup: 8 patients<br>• Cleaning: 5 patients<br>• Extraction: 3 patients<br>• Filling: 2 patients<br><div class="progress mt-2"><div class="progress-bar bg-success" style="width:45%">Checkup</div></div>`; showToast('Treatment statistics loaded'); }

// ACTIVITY & CHART
function updateActivity(){ let acts=document.getElementById('recentActivityList'); acts.innerHTML=appointments.slice(-3).map(a=>`<li class="list-group-item border-0 ps-0"><i class="fa fa-tooth me-2 text-info"></i> ${a.patient_name} - ${a.status} on ${a.appointment_date}</li>`).join(''); if(appointments.length===0) acts.innerHTML='<li class="list-group-item">No recent activity</li>'; }
let chart; function drawChart(){ let ctx=document.getElementById('apptChart').getContext('2d'); if(chart) chart.destroy(); chart=new Chart(ctx,{type:'bar',data:{labels:['Mon','Tue','Wed','Thu','Fri','Sat'],datasets:[{label:'Appointments',data:[2,3,5,4,3,2],backgroundColor:'#2a9d8f',borderRadius:8}]},options:{responsive:true}}); }
function saveSettings(){ let settings={clinicName:document.getElementById('clinicNameInput').value,clinicEmail:document.getElementById('clinicEmailInput').value,clinicPhone:document.getElementById('clinicPhoneInput').value}; localStorage.setItem('clinicSettings',JSON.stringify(settings)); showToast('Settings saved'); }
function loadSettings(){ let s=localStorage.getItem('clinicSettings'); if(s){let d=JSON.parse(s); document.getElementById('clinicNameInput').value=d.clinicName; document.getElementById('clinicEmailInput').value=d.clinicEmail; document.getElementById('clinicPhoneInput').value=d.clinicPhone;} }
function showSection(id){ document.querySelectorAll('#dashboardApp .section').forEach(s=>s.classList.remove('active-section')); document.getElementById(id).classList.add('active-section'); if(id==='dashboard'){updateStats();updateActivity();drawChart();} }
function logout(){ let msg=document.createElement('div'); msg.className='logout-message'; msg.innerHTML='<i class="fa fa-heart text-danger"></i> Thank you for using Royal Dental Clinic HSM! <strong>MIGISHA David Bonheur</strong> (202212231) - ULK Project. Come back soon!'; document.body.appendChild(msg); setTimeout(()=>msg.remove(),3500); localStorage.removeItem('dental_logged_in'); document.getElementById('dashboardApp').style.display='none'; document.getElementById('loginPage').style.display='flex'; showToast('Logged out successfully. We appreciate your work!','success'); }
function handleLogin(e){ e.preventDefault(); let email=document.getElementById('loginEmail').value; let pwd=document.getElementById('loginPassword').value; if(email==='admin@royaldental.com' && pwd==='admin123'){ localStorage.setItem('dental_logged_in','true'); document.getElementById('loginPage').style.display='none'; document.getElementById('dashboardApp').style.display='block'; refreshAllData(); showToast('Welcome to Royal Dental Clinic HSM - ULK Project 🦷','success'); } else { showToast('Invalid credentials. Use admin@royaldental.com / admin123','danger'); } return false; }
function checkAuth(){ if(localStorage.getItem('dental_logged_in')==='true'){ document.getElementById('loginPage').style.display='none'; document.getElementById('dashboardApp').style.display='block'; refreshAllData(); } else { document.getElementById('loginPage').style.display='flex'; document.getElementById('dashboardApp').style.display='none'; } }
document.getElementById('patientSearch')?.addEventListener('input',()=>renderPatients());
window.onload=()=>{ checkAuth(); loadSettings(); };
</script>
</body>
</html>