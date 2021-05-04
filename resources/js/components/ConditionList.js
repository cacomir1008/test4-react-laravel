import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import styled from 'styled-components';

function ConditionList() {
    const [conditions, setConditions] = useState([]);

    // 画面が読み込まれたらgetする
    useEffect(() => {
        getAllConditions()
    },[])
    // useEffect(
    //     () => {
    //         axios
    //             .get( '/api/allinfo' )
    //             .then( (res) => {
    //                 setConditions(res.data.conditions);
    //             })
    //             .catch( (error) => {
    //                 console.log('Error', error.message);
    //             })
    //     },
    //     []
    // );
    const getAllConditions = async () => {
        await axios
        .get('/api/allinfo')
        .then( (res) => {
                    setConditions(res.data.conditions);
                    response=> console.log('body:',response.data);
                    response=> console.log('status:', response.status); // 200
                }).catch(error => {
                     console.log('Error',error.response);
                         });
                }
    return(
        <>
        {conditions.map((condition) => (
            <div key={condition.id}>
            <Box bg="#FFF5F5" boxShadow="dark-lg" w="30%" p={4} color="gray">
                <dt>いつから感じたか</dt>
                <dd>{condition.start}</dd>
                <dt>いつ診断されたか</dt>
                <dd>{condition.diagnosis}</dd>
                <dt>今病院に通っているか</dt>
                <dd>{condition.hospital}</dd>
                <dt>コメント</dt>
                <dd>{condition.comment}</dd>
             </Box>
             </div>
             )
             )
            }
        </>
        )
}

// export default ConditionList;

if (document.getElementById('conditionlist')) {
    ReactDOM.render(<ConditionList />, document.getElementById('conditionlist'));
}
