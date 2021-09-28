import React from "react";
import imageCleaner from "../../images/workerCartoon.png";
import ReactDOM from "react-dom";
import ListeTache from "../listeTache/listeTache";

class RenderHome extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isHome: this.props.isHome
        }
    }

    render() {
        return (
            <div >

                <img src={imageCleaner} alt='image home page' width='100%' height='100%' />
                <h1 className='text-center' >Welcome to JobCleaning !</h1 >
            </div >
        );
    }


}

export default class Home extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isHome: true,
            classCss: 'group-button text-center mt-2 afficher'
        }

    }

    handleClick = () => {
        this.setState({
            isHome: false,
            classCss: 'group-button text-center mt-2 cacher'
        })
    }

    render() {
        return (
            <div id="row" className='container_home_page' >
                {this.state.isHome ? <RenderHome isHome={this.state.isHome} /> : <ListeTache />}
                    <div className={this.state.classCss} >
                        <button className='btn btn-primary mt-2' onClick={this.handleClick} >Voir les tâches restantes du jour
                        </button >
                    </div >
            </div >
        );
    }
}

ReactDOM.render(<Home />, document.getElementById('root'));