package activity;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.widget.EditText;
import android.widget.TextView;

import com.nyp.edu.renthousesystem.R;

import database.JSONParser;

public class PricedetailActivity extends Activity{
	String town="";
	 String uri = null; 
	private static String url_all_price = "http://192.168.1.17/chenyu/price_read.php?town=";
	String[] room= new String[7];
	
	  public void onCreate(Bundle savedInstanceState) {
	        super.onCreate(savedInstanceState);
	        setContentView(R.layout.activity_price);
	  Bundle b =this.getIntent().getExtras();      
	  if(b !=null)	
	  {
		  town=b.getString("town");
		  town="\""+town+"\"";

	  }
	  StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy); 
		   try{
		    	
		    	uri= url_all_price+
		    			URLEncoder.encode(town, "UTF-8");
		    	
		    }
		   
		    catch(UnsupportedEncodingException e){ e.printStackTrace();}
		   Log.d("sad",uri);
			List<NameValuePair> params = new ArrayList<NameValuePair>();
		    JSONParser jsonParser1 = new JSONParser();
		    String json1 = jsonParser1.makeHttpReques(uri, "POST", params);
			  Log.d("sad",json1);
		    try {
				JSONObject jSONObject = new JSONObject(json1);
				JSONArray array = jSONObject.getJSONArray("users");
				room[0] = array.getJSONObject(0).getString("TOWN");
				room[1] = array.getJSONObject(0).getString("1-ROOM");
				room[2] = array.getJSONObject(0).getString("2-ROOM");
				room[3] = array.getJSONObject(0).getString("3-ROOM");
				room[4] = array.getJSONObject(0).getString("4-ROOM");
				room[5] = array.getJSONObject(0).getString("5-ROOM");
				room[6] = array.getJSONObject(0).getString("EXECUTIVE");
				TextView town1 = (TextView)findViewById(R.id.textView1);
				TextView room1 = (TextView)findViewById(R.id.textView2);
				TextView room2 = (TextView)findViewById(R.id.textView3);
				TextView room3 = (TextView)findViewById(R.id.textView4);
				TextView room4 = (TextView)findViewById(R.id.textView5);
				TextView room5 = (TextView)findViewById(R.id.textView6);
				TextView exe = (TextView)findViewById(R.id.textView7);
			    town1.setText("TOWN : "+room[0]);		   
			    room1.setText("1-ROOM : "+room[1]);	
			    room2.setText("2-ROOM : "+room[2]);	
			    room3.setText("3-ROOM : "+room[3]);	
			    room4.setText("4-ROOM : "+room[4]);	
			    room5.setText("5-ROOM : "+room[5]);	
			    exe.setText("EXECUTIVE : "+room[6]);	
	  }catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	  }}
