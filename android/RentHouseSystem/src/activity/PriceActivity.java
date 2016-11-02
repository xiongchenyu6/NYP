package activity;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.nyp.edu.renthousesystem.R;

import database.JSONParser;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.AdapterView.OnItemClickListener;

public class PriceActivity extends Activity{
	
	

	
	// List view
	private ListView lv;
	
	// Listview Adapter
	ArrayAdapter<String> adapter;
	String selected="";
	// Search EditText
	EditText inputSearch;
    private String address;
    private static String url_all_price = "http://192.168.1.17/chenyu/price_readall.php";
	
	// ArrayList for Listview
	ArrayList<HashMap<String, String>> productList;

    @SuppressWarnings("null")
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
		StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy); 
			List<NameValuePair> params = new ArrayList<NameValuePair>();
		    JSONParser jsonParser1 = new JSONParser();
		    String json1 = jsonParser1.makeHttpReques(url_all_price, "GET", params);
		    try {
				JSONObject jSONObject = new JSONObject(json1);
				JSONArray array = jSONObject.getJSONArray("users");
				String[]address = new String[(array.length())];
				  for (int i=0; i<array.length(); i++){
					  address[i] = array.getJSONObject(i).getString("TOWN");
						lv = (ListView) findViewById(R.id.list_view);
						inputSearch = (EditText) findViewById(R.id.inputSearch);
						adapter = new ArrayAdapter<String>(this, R.layout.list_item, R.id.address_name,address);
						lv.setAdapter(adapter);
						inputSearch.addTextChangedListener(new TextWatcher()
						{			@Override
							
							
							
							public void onTextChanged(CharSequence cs, int arg1, int arg2, int arg3) {
							// When user changed the Text
							PriceActivity.this.adapter.getFilter().filter(cs);	
						}

						@Override
						public void beforeTextChanged(CharSequence arg0, int arg1, int arg2,
								int arg3) {
							// TODO Auto-generated method stub
							
						}

						@Override
						public void afterTextChanged(Editable arg0) {
							// TODO Auto-generated method stub							
						}
						});
				    
				  }
				  lv.setOnItemClickListener(new OnItemClickListener() {
                        
			
						@Override
						public void onItemClick(AdapterView<?> arg0, View view,
								int position, long id) {
						     Intent appInfo = new Intent(PriceActivity.this, PricedetailActivity.class); 
			
							    selected=  lv.getItemAtPosition(position).toString();

							    Bundle b =new Bundle();
							    b.putString("town", selected);							    
							    appInfo.putExtras(b);
						        startActivity(appInfo);

							
						}
				    });}catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}


		}
  

}

