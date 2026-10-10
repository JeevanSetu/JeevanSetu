<section class="emergency emergency-premium">
  <div class="emergency-orb eo-one"></div><div class="emergency-orb eo-two"></div>
  <div class="emergency-shell">
    <div class="emergency-intro reveal">
      <span class="emergency-badge"><i></i> 24×7 EMERGENCY RESPONSE</span>
      <h1>Help starts with<br><span>one alert.</span></h1>
      <p>Share the essential incident details and location so participating emergency teams can coordinate a faster response.</p>
      <div class="emergency-photo"><img src="https://images.unsplash.com/photo-1587745416684-47953f16f02f?auto=format&fit=crop&w=1400&q=85" alt="Emergency medical response" loading="eager"><div class="emergency-photo-overlay"><b>Emergency Network</b><span>Fast • Connected • 24×7</span></div></div>
      <div class="emergency-points"><div><strong>01</strong><span><b>Report</b><small>Share incident details</small></span></div><div><strong>02</strong><span><b>Locate</b><small>Add precise location</small></span></div><div><strong>03</strong><span><b>Coordinate</b><small>Enable response workflow</small></span></div></div>
    </div>
    <form method="post" action="<?=htmlspecialchars($config['base_url'])?>/emergency/report" class="form-card emergency-form reveal delay-1">
      <div class="emergency-form-head"><span class="sos-icon">+</span><div><small>HEALTH SETU SOS</small><h2>Emergency Alert</h2></div><span class="status-live">LIVE</span></div>
      <div class="grid2"><label>Emergency Type<select name="type"><option value="accident">Accident</option><option value="medical">Medical Emergency</option><option value="sos">SOS / Other</option></select></label><label>Severity<select name="severity"><option value="unknown">Unknown</option><option value="moderate">Moderate</option><option value="critical">Critical</option></select></label></div>
      <label>Location / Address<textarea name="address" placeholder="Enter landmark, road, area or hospital location"></textarea></label>
      <div class="grid2"><label>Latitude<input name="latitude" placeholder="e.g. 28.6139"></label><label>Longitude<input name="longitude" placeholder="e.g. 77.2090"></label></div>
      <label>Description<textarea name="description" placeholder="Briefly describe what happened and what help is needed"></textarea></label>
      <button class="btn danger emergency-submit"><span>Send Emergency Alert</span><b>→</b></button>
      <p class="emergency-note">For immediate life-threatening danger, contact your local emergency service as well.</p>
    </form>
  </div>
</section>